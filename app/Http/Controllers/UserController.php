<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function edit(User $user) {
    	if (Auth::user() != $user)
    		return redirect('/');
    	
    	return view('user.edit', ['user' => $user]);
    }

    public function update(User $user) {

    }

    public function delete(User $user) {
    	if (Auth::user() != $user)
    		return redirect('/');

    	$user->delete();

    	\Session::flash('success', 'Your account has been successfully deleted!');
    	return redirect('/');
    }
}
