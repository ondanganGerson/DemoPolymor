<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('getBooks.getRates','rate')
        ->get();    
        
        return response()->json($authors, 200);
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
        $storeAuthor = Author::create($request->all());
        return response()->json($storeAuthor,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showAuthor = Author::with('getBooks.getRates','rate')->find($id);
        if(is_null($showAuthor)) {
            return response()->json(['error'=>'No Record Found!'], 404);
        }
        return response()->json($showAuthor,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $updateAuthor = Author::find($id);
        if(is_null($updateAuthor)) {
            return response()->json(['error' => 'No Record Found!' ], 404);
        }
        $updateAuthor->update($request->all());
        return response( $updateAuthor ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteAuthor = Author::find($id);
        if (!is_null($deleteAuthor)) {
            $deleteAuthor->delete();
            return response()->json(['error'=>'Record Successfully Deleted!'], 200);
        }
        return response()->json(['message'=>'No Record Found!'], 404);
    }
}
