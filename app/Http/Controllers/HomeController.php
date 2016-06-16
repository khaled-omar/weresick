<?php

namespace App\Http\Controllers;

use App\Post;
use App\Journal;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Redirect the user to his Journal.
     *
     * @return \Illuminate\Http\Response
     */
    public function myJournal(Request $request)
    {
        $journal_id = $request->user()->getJournalID();
        return redirect('/journal/'.$journal_id);
    }

    /**
     * Show the user's journal.
     *
     * @return \Illuminate\Http\Response
     */
    public function getJournal(Request $request)
    {
        //if the user should only be able to see his journal , we should check
        //here whether the journal id belongs to him
        $journal_id = $request->id;

        $journal = Journal::find($journal_id);
        $posts = $journal->posts()->with('user')->get();

        return view('journal', [
            'posts' => $posts,
            'journal' => $journal
        ]);
    }

    public function newsFeed()
    {
        // TODO: show posts for related tags that the user has recently used
        $journals = Journal::all();
        return view('welcome', [
            'journals' => $journals
        ]);
    }
}
