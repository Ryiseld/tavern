<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        
    }

    public function index() {
    	$topics = Topic::orderBy('created_at', 'desc')->get();
        return view('home', ['topics' => $topics]);
    }
}
