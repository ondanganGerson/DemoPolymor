<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientComment;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = Client::get();
    //   dd($client);
        return view('layouts.admin.client.index', ['client' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create($request->all());

        return redirect()->route('client.index')->with('save', ' Registered naka Pre! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    { 
        



                            //id of client

        $data = Client::find($client);  //foreign key      // primary key                               //defining $data for show.blade
        $comments = ClientComment::where('client_id',$client->id)->get(); //defining $comment for comment relationship to show comment
        // dd($comments);
        
        return view('layouts.admin.client.show')
                ->with('data',$data)                                    //for show.blade
                ->with('comments',$comments);                          // for comment relationship
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        // dd($client);
    
        return view('layouts.admin.client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        // dd($client);
               //name property from input
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->contact = $request->input('contact');

        $client->save();

        return redirect()->back()->with('save', ' Pre successfully updated naka!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // dd($client);
        $client->delete(); //delete() is requested from index.blade

        return redirect()->route('client.index')->with('delete', ' Pre successfully deleted na!! ');
    }
}
