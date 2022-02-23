<?php

namespace App\Http\Controllers;

use App\Models\StudentComment;
use Illuminate\Http\Request;

class StudentCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {           //new Comment(models)          
        $comment = new StudentComment();           //defining $comment
        $comment->comment = $request->comment;     //defining $comment
        $comment->class_id = $request->class_id;   //defining $comment
        $comment->save();

        // dd($comment);              //define a $comment if you have something to send to show.blade
        return redirect()->route('classs.show', $comment->class_id); //comment -> post_id

        //or

        // StudentComment::create($request->all());
        
        // return redirect()->route('classs.show', $request->class_id);  
                                         //passing $request to show as requested
                                        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentComment  $studentComment
     * @return \Illuminate\Http\Response
     */
    public function show(StudentComment $studentComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentComment  $studentComment
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentComment $studentComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentComment  $studentComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentComment $studentComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentComment  $studentComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentComment $studentComment)
    {
        //
    }
}
