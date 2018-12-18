<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = DB::table('posts')
        ->orderBy('id', 'desc')
        ->orderBy('title', 'desc')
        ->orderBy('body', 'desc')
        ->orderBy('image', 'desc')
        ->get();
        
        $comments = DB::table('comments')
        ->orderBy('id', 'desc')
        ->orderBy('body', 'desc')
        ->orderBy('postid','desc')
        ->get();
        
        return view('home',['posts' => $posts],['comments' => $comments]);
        
    }
    public function cancel(Request $request) {

        return redirect()->route('home');
    }
}
