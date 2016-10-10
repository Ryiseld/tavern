<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Reply;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class TopicController extends Controller
{
	public function show(Topic $topic) {
        $replies = Reply::where('topic_id', $topic->id)->orderBy('created_at', 'desc')->paginate('10');
		return view('topic.show', ['topic' => $topic, 'replies' => $replies]);
	}

    public function new() {
    	return view('topic.new');
    }

    public function create(Request $request) {
    	$this->validateRequest($request);

    	$user = Auth::user();
    	$topic = new Topic;
    	$topic->title = $request->title;
    	$topic->content = $request->content;
    	$topic->user_id = $user->id;
    	$topic->save();

    	\Session::flash('success', 'Your topic has been successfully created!');
    	return redirect()->route('topic', ['topic' => $topic]);
    }

    public function edit(Topic $topic) {
        if (Auth::user() != $topic->user)
            return redirect('/');

         return view('topic.edit', ['topic' => $topic]);
    }

    public function update(Topic $topic, Request $request) {
        if (Auth::user() != $topic->user)
            return redirect('/');

        $this->validateRequest($request);

        $topic->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        \Session::flash('success', 'Your topic has been successfullyupdated!');
        return redirect()->route('topic', ['topic' => $topic]);
    }

    public function delete(Topic $topic) {
        if (Auth::user() != $topic->user)
            return redirect('/');

        if (Topic::where('id', $topic->id)->firstOrFail()->delete()) {
            \Session::flash('success', 'Your topic has been successfullyupdateddeleted!');
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    protected function validateRequest(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:2|max:80',
            'content' => 'required|min:2'
        ]);
    }
}
