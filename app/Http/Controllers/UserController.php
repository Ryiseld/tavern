<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function edit(User $user) {
    	return view('user.edit', ['user' => $user]);
    }

    public function update(User $user) {

    }
}
