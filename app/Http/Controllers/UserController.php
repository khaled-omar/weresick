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
        $allowedable_Tags = '<a></a><p></p><b></b><h1></h1><h2></h2>
            <h3></h3><h4></h4><h5></h5><h6></h6><sub></sub><em></em>
            <sup></sup><blockquote></blockquote><ul></ul><s></s>
            <ol></ol><li></li><div></div><pre></pre><span></span>
            <strong></strong><code></code>';
        $post = new Post;
        //$out = htmLawed($in, array('safe'=>1));
        $post->content = strip_tags(html_entity_decode($request->content),$allowedable_Tags ) ;
        $post->user_id = $user->id;

        $journal = Journal::find($request->journal_id);
        $journal->posts()->save($post);

        return Redirect::back();
    }
}
