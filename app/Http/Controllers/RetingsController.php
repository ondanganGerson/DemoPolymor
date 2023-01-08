<?php

namespace App\Http\Controllers;

use App\Models\Retings;
use Illuminate\Http\Request;

class RetingsController extends Controller
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
    {
        // dd($request->all());
        Retings::create([
            'rate' => $request->input('rate'),
            'book_id' => $request->input('book_id')
        ]);

        return redirect()->route('book.index')->with('rate', 'Book has been successfully rated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retings  $retings
     * @return \Illuminate\Http\Response
     */
    public function show(Retings $retings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retings  $retings
     * @return \Illuminate\Http\Response
     */
    public function edit(Retings $retings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retings  $retings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retings $retings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retings  $retings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retings $retings)
    {
        //
    }
}
