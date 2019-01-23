<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderby('created_at', 'desc')->paginate(10);

        return view('admin-panel.pages.index_posts')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.pages.created_posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $posts = new Posts();

        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->content = $request->content;

        $posts->save();

//        $inputs = $request->all();
//
//        $users = User::Create($inputs);
//
        return redirect()->action('PostsController@index');

//        return view('admin-panel.show_users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Posts::find($id);

        return view('admin-panel.pages.edit_posts')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = Posts::find($id);

        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->content = $request->content;

        $posts->save();

//        $inputs = $request->all();
//
//        $users = User::Create($inputs);
//
        return redirect()->action('PostsController@index');

//        return view('admin-panel.show_users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::find($id)->delete();

        return redirect()->route('posts.index');

    }
}
