<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    	$topics = Topic::orderBy('created_at', 'desc')->paginate(15);
        return view('home', ['topics' => $topics]);
    }
}
