<?php

namespace App\Http\Controllers;

use App\Topic;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class TopicController extends Controller
{
	public function show(Topic $topic) {
		return view('topic.show', ['topic' => $topic]);
	}

    public function new() {
    	return view('topic.new');
    }

    public function create(Request $request) {
    	$this->validate($request, [
    		'title' => 'required|min:3|max:80',
    		'content' => 'required'
    	]);

    	$user = Auth::user();
    	$topic = new Topic;
    	$topic->title = $request->title;
    	$topic->content = $request->content;
    	$topic->user_id = $user->id;
    	$topic->save();

    	\Session::flash('success', 'Your topic has been created!');
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

        $this->validate($request, [
            'title' => 'required|min:3|max:80',
            'content' => 'required'
        ]);

        $topic->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        \Session::flash('success', 'Your topic has been updated!');
        return redirect()->route('topic', ['topic' => $topic]);
    }
}
