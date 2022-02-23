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
    {        //model Post::get(); passing to view with fillable
       $post = Post::get();
       

       
                                                
                                                //$post passing data created to to postindex from create to store() to index()
                                                //postindex has data and pass it to index.blade as requested with data filled
         return view('layouts.admin.blog.index', ['postindex' => $post]       );    
                                                /*or compact('data')*/
                                                 //or ->with('data',$data);

                                              
                                                           
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
        
            // new Post(models)
        $post = new Post(); 
        $post->title = $request->input('title');
              //name of input   
        $post->description = $request->input('description');
              
        $post->save();

        return redirect()->route('post.index')->with('save', 'Post successfully stored'); // redirect to (post.index);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    
    {
        // $comment = new Comment(['message' => 'A new comment.']);

        //  $post = Post::find(1);

        //  $post->comments()->save($comment);     
        // return Post::find($post)->comments;
        //  dd($post);                                   with data filled pass to view as requested
        return view('layouts.admin.blog.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    // public function edit(post $post)
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
        $post->update(['title'       => $request->title,              //no need to validate the Request
                       'description' => $request->description]);    
        
        //or   

              
        // $post->title = $request->input('title');
        // $post->description = $request->input('description');
        // $post->save();
        
        return redirect()->route('post.index')->with('save', 'Post successfully updated');

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
