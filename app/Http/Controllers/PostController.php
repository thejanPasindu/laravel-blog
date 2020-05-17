<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        
        $validatedData += ['user_id' => auth()->user()->id];
        $post = new Post($validatedData);
        $post->save();
        return redirect('/posts')->with('success', 'Post Created..!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = Post::find($post->id);
        return view('posts.show')->with('post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = Post::find($post->id);

        if($data->user_id != auth()->user()->id){
            return redirect('/posts')->with('error', 'Unathurized..!');
        }
        return view('posts.edit')->with('post', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        
        $data = Post::find($id);
        $data->title = $request->title;
        $data->body = $request->body;
        $data->user_id = auth()->user()->id;
       
        $data->save();
        return redirect('/posts')->with('success', 'Post Updated..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $data = Post::find($post->id);

        if($data->user_id != auth()->user()->id){
            return redirect('/posts')->with('error', 'Unathurized..!');
        }
        
        $data->delete();
        return redirect('/posts')->with('success', 'Post Deleted..!');

    }
}
