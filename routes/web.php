<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\ClasssController;         //DEFINE YOUR CONTROLLER HERE
use App\Http\Controllers\StudentCommentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientCommentController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\RoomTableController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User;
use App\Http\Controllers\HomeController;


// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::middleware('auth')->group(static function () {
//     Route::resource('post',PostController::class);



Route::middleware('auth')->group(function () {
    //LogActivity
    Route::get('add-to-log', [HomeController::class, 'myTestAddToLog'])->name('add-to-log');
    Route::get('logActivity', [HomeController::class, 'logActivity'])->name('logActivity');
    
    // post routes
                 //name whatever you want for url
    Route::prefix('postssss')->group(function () {  
                                                      
          //method // url                                //name method is to redirect to specific routes
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('/', [PostController::class, 'store'])->name('post.store');
        Route::get('{post}', [PostController::class, 'show'])->name('post.show');
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });

    // comment routes
    Route::prefix('comments')->group(function () {
            //method request -> controller                                     
        Route::post('comment-store', [CommentController::class, 'store'])->name('comment-store');
    }); 

    Route::resource('classs',ClasssController::class);
    Route::post('post-comment', [StudentCommentController::class, 'store'])->name('post-comment');

    //client
    Route::resource('client',ClientController::class);
    Route::post('client-comment',[ClientCommentController::class, 'store'])->name('client-comment');
            // '/client/comment'
         

    //car
    Route::resource('car', CarController::class);
    Route::get('/home',[CarModelController::class,'index'])->name('home.index');
    // Route::get('/home', function () {
    //     return view('layouts.admin.carmodel.index', ['name' => 'James, Im defined through routes']);
    // });
    Route::post('car-model', [CarModelController::class, 'store'])->name('car-model'); //relation of carmodel

    //name
    // Route::resource('name', NameController::class);
    Route::get('/name',[NameController::class, 'index'])->name('name.index');  //setters route  
                                                     //controller method                       //views
    Route::get('/name-firstname',[NameController::class, 'getFirstName'])->name('name-firstname-getname'); //getters route
    Route::get('/name-lastname', [NameController::class, "getLastName"])->name('name-lastname-getnamename');
    Route::get('/name-view/{name}', [NameController::class, 'view'])->name('name-view'); //?

    //Rooms
    // Route::resource('room', RoomsController::class);        //route views must the same 
    Route::get('/room',[RoomsController::class, 'index'])->name('room.index');
    Route::get('create', [RoomsController::class, 'create'])->name('room.create');

    //RoomTables
    // Route::resource('room-tables', [RoomTables::class]);             //for routes() use not for view(), if view() use view('layouts.admin.roomtables.index')
    Route::get('/roomtables', [RoomTableController::class, 'index'])->name('roomtables.index');
    Route::get('roomtables.create', [RoomTableController::class, 'create'])->name('roomtables.create');
    Route::post('roomtables,store', [RoomTableController::class, 'store'])->name('roomtables.store');
    Route::get('{roomTable}', [RoomTableController::class, 'show'])->name('roomtables.show');
    Route::get('{roomTable}/edit', [RoomTableController::class, 'edit'])->name('roomtables.edit');
    Route::put('{roomTable}', [RoomTableController::class, 'update'])->name('roomtables.update');
    Route::delete('{roomTable}', [RoomTableController::class, 'destroy'])->name('roomtables.destroy');
               //{roomTable} must the same when filling out ex.{{$roomTable->name}}


    //brand
    // Route::resource('brand', BrandController::class);
    Route::get('/', [BrandController::class, 'index'])->name('brand.index');    
    Route::get('create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/', [BrandController::class, 'store'])->name('brand.store');

    
    
    

      
    
    


    

});