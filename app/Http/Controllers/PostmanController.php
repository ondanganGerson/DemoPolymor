<?php

namespace App\Http\Controllers;

use App\Models\RoomTable;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

use function PHPUnit\Framework\returnSelf;

class PostmanController extends Controller
{
    //get
    public function getRoom()
    {
        $rooms = RoomTable::all();
        return response()->json($rooms, 200);
    }

    //get room by id
    public function getRoomById($id)
    {   
        $roomById = RoomTable::find($id);        
        if(is_null($roomById)) {
            return response()->json(['message' => 'Room Not Found!'], 404);
        }
        return response()->json($roomById, 200);
    }

    //store room
    public function addNewRoom(Request $request)
    {
        $addNewRoom = RoomTable::create($request->all());
        return response($addNewRoom, 201);
    }

    //update room
    public function updateRoom(Request $request, $id) 
    {
        $updateRoom = RoomTable::find($id);
        if(is_null($updateRoom)) {
            return response()->json(['message' => 'Room Not Found!'], 404);
        }
        $updateRoom->update($request->all());
        return response()->json($updateRoom, 200);
    }
    
    //delete room
    public function RemoveRoom($id)
    {
        $room = RoomTable::find($id);
        if(!is_null($room)){
            $room->delete();
            return response()->json(['message' => 'Successfully Deleted!'], 200);
        }        
        return response()->json(['message' => 'Room Not Found!'], 404);            

    }

   
}

