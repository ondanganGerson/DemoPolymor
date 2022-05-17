<?php

namespace App\Http\Controllers;

use App\Models\RoomTable;
use Illuminate\Http\Request;

class RoomTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = RoomTable::latest()->paginate(5);
       
    
        return view('layouts.admin.roomtables.index',compact('room'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.roomtables.create');
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
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        RoomTable::create($input);
     
        return redirect()->route('roomtables.index')
                         ->with('success','pre! created successfully.');
    }

    /**i
     * Display the specified resource.
     *
     * @param  \App\Models\RoomTable  $roomTable
     * @return \Illuminate\Http\Response
     */
    public function show(RoomTable $roomTable)

    { 
        return view('layouts.admin.roomtables.show',compact('roomTable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomTable  $roomTable
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomTable $roomTable)
    {
        return view('layouts.admin.roomtables.edit',compact('roomTable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomTable  $roomTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomTable $roomTable)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $roomTable->update($input);
    
        return redirect()->route('roomtables.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomTable  $roomTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomTable $roomTable)
    {
        $roomTable->delete();
     
        return redirect()->route('roomtables.index')
        ->with('success','Product deleted successfully');
    }
}
