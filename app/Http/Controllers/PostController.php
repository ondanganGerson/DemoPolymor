<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $post = Post::get();
        
        return view('layouts.admin.blog.index', ['postindex' => $post]);                           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()      
    {
        return view('layouts.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {    
        // Post::create($request->all());
        //  session()->flash('save','Blog successfully stored');
        //  return redirect('postssss');  //redirect to (post.index)

         //or
        $post = new Post(); 
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect()->route('post.index')->with('save', 'Post successfully stored'); 
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {       
        return view('layouts.admin.blog.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('layouts.admin.blog.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, post $post)
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,         
            'description' => $request->description
        ]);    
        
        return redirect()->route('post.index')->with('edit', 'Post successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    // public function destroy(post $post)
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('delete', 'Post successfully deleted');

        
    }
}
