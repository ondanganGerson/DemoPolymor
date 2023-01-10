<?php

use App\Http\Controllers\ApiController\AuthorController as ApiControllerAuthorController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostmanController;
use App\Http\Controllers\ApiController\PhoneController;
use App\Http\Controllers\ApiController\ReviewController;
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

//for postman test 
Route::get('/room',[PostmanController::class, 'getRoom'])->name('room');
Route::get('/roomById/{id}',[PostmanController::class, 'getRoomById'])->name('roomById');
Route::post('/addRoom',[PostmanController::class, 'addNewRoom'])->name('addRoom'); 
Route::put('/updateRooms/{id}',[PostmanController::class, 'updateRoom'])->name('updateRooms'); 
Route::delete('/deleteRoom/{id}',[PostmanController::class, 'RemoveRoom'])->name('deleteRoom');


// Route::apiResource('/author',AuthorController::class);
Route::get('/author', [ApiControllerAuthorController::class, 'index'])->name('author'); 
Route::get('showAuthor/{id}', [ApiControllerAuthorController::class, 'show'])->name('showAuthor');  
Route::post('/storeAuthor', [ApiControllerAuthorController::class, 'store'])->name('storeAuthor'); 
Route::put('updateAuthor/{id}', [ApiControllerAuthorController::class, 'update'])->name('updateAuthor'); 
Route::delete('/deleteAuthor/{id}', [ApiControllerAuthorController::class, 'destroy'])->name('deleteAuthor');


//phone
Route::apiResource('phones',PhoneController::class);
//review
Route::prefix('/phones')->group(function() {
    Route::apiResource('/{id}/review',ReviewController::class);
});
