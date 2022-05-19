<?php

use App\Http\Controllers\PostmanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get all room table
Route::get('/room',[PostmanController::class, 'getRoom'])->name('room');
//get all room table by id
Route::get('/roomById/{id}',[PostmanController::class, 'getRoomById'])->name('roomById');
//add new room table 
Route::post('/addRoom',[PostmanController::class, 'addNewRoom'])->name('addRoom'); 
//delete room
Route::delete('/deleteRoom/{id}',[PostmanController::class, 'RemoveRoom'])->name('deleteRoom');
