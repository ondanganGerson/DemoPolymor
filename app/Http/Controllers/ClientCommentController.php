<?php

namespace App\Http\Controllers;

use App\Models\ClientComment;
use Illuminate\Http\Request;

class ClientCommentController extends Controller
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
        $comment = new ClientComment();             //defining comment to send to show as requested
        $comment->comment = $request->comment;
        $comment->client_id = $request->client_id;
        $comment->save();

    return redirect()->route('client.show', $request->client_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function show(ClientComment $clientComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientComment $clientComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientComment $clientComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientComment $clientComment)
    {
        //
    }
}
