<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Topic;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
	public function create(Topic $topic, Request $request) {
		$this->validateRequest($request);

		$user = Auth::user();
		$reply = new Reply;
		$reply->content = $request->content;
		$reply->topic_id = $topic->id;
		$reply->user_id = $user->id;
		$reply->save();

		\Session::flash('success', 'Your reply has been successfully created!');
    	return redirect()->route('topic', ['topic' => $topic]);
	}

	public function edit(Reply $reply) {
		if (Auth::user() != $reply->user)
            return redirect('/');

		return view('reply.edit', ['reply' => $reply]);
	}

	public function update(Reply $reply, Request $request) {
		if (Auth::user() != $reply->user)
            return redirect('/');

		$this->validate($request, [
			'content' => 'required|min:2'
		]);

		$reply->update([
            'content' => $request->content
        ]);

        \Session::flash('success', 'Your reply has been successfully updated!');
        return redirect()->route('topic', ['topic' => $reply->topic]);
	}

	public function delete(Reply $reply) {
		if (Auth::user() != $reply->user)
            return redirect('/');

        if (Reply::where('id', $reply->id)->firstOrFail()->delete()) {
            \Session::flash('success', 'Your reply has been successfully deleted!');
            return redirect()->route('topic', ['topic' => $reply->topic]);
        } else {
            return redirect('/');
        }
	}

	protected function validateRequest(Request $request) {
		$this->validate($request, [
			'content' => 'required|min:2'
		]);
	}
}
