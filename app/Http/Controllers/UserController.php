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

    public function update(User $user, Request $request) {
        if ($request->input('email') != null) { // Change email
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:users'         
            ]);

            $user->email = $request->input('email');
        }

        if ($request->input('password') != null) { // Change password
            $this->validate($request, [
                'password' => 'required|min:6|confirmed'
            ]);

            $user->password = bcrypt($request->input('password'));
        }

        $user->save(); 

        \Session::flash('success', 'Your account settings have been successfully updated!');
        return redirect('/');
    }

    public function delete(User $user) {
    	if (Auth::user() != $user)
    		return redirect('/');

    	$user->delete();

    	\Session::flash('success', 'Your account has been successfully deleted!');
    	return redirect('/');
    }
}
