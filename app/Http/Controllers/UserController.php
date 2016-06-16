<?php

namespace App\Http\Controllers;

use App\Post;
use App\Journal;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Redirect;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Creates a post
     */
    public function post(Request $request)
    {
    	$validator = Validator::make($request->all(), [
        	'content' => 'required',
        	'journal_id' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back();
        }

        $user = $request->user();

        $post = new Post;
        $post->content = $request->content;
        $post->user_id = $user->id;

        $journal = Journal::find($request->journal_id);
        $journal->posts()->save($post);

        return Redirect::back();
    }
}
