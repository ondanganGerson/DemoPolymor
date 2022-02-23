<?php

namespace App\Http\Controllers;

use App\Models\classs;
use App\Models\StudentComment;
use Illuminate\Http\Request;

class ClasssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varclasss = Classs::get();

        // dd($varclasss);

        return view('layouts.admin.student.index', ['varclasss' => $varclasss]);
                // ->with('varclasss', $varclasss);

    }

    /**
     * Show the form for creating a new resource.s
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Classs::create($request->all()); 

        return redirect()->route('classs.index')->with('save', 'Student Successfully Enrolled!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function show(classs $classs)
    {
        // dd($classs);
        $info = Classs::find($classs);
        $comments = StudentComment::where('class_id',$classs->id)->get();
        // dd($comments);
        return view('layouts.admin.student.show')
                ->with('info',$info)
                ->with('comments',$comments);

                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function edit(classs $classs)
    {
        return view('layouts.admin.student.edit', ['sampleclasss' => $classs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, classs $classs)
    {
        $classs->name = $request->input('name');
        $classs->lastname = $request->input('lastname');
        $classs->address = $request->input('address');
        $classs->save();

        return redirect()->route('classs.index')->with('save', ' Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function destroy(classs $classs)
    {
       
        $classs->delete();
        // $classs->delete();
        
        return redirect()->route('classs.index')->with('delete', ' Post successfully deleted ');
    }
}
