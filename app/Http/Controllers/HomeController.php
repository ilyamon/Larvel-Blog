<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function content()
    {
        return view('includes.content');
    }

    public function index()
    {
        $posts = Posts::orderby('created_at', 'desc')->paginate(3);

        return view('includes.content')->with('posts', $posts);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $posts = Posts::find($id);

        return view('home.pages.show_post')->with('posts', $posts);

    }

}
