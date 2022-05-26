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
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RetingsController;

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

Route::middleware('auth')->group(function () {
    Route::get('add-to-log', [HomeController::class, 'myTestAddToLog'])->name('add-to-log');
    Route::get('logActivity', [HomeController::class, 'logActivity'])->name('logActivity');
            
    Route::prefix('blog')->group(function () {      
                    //url                                       //route
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('/', [PostController::class, 'store'])->name('post.store');
        Route::get('{post}', [PostController::class, 'show'])->name('post.show');
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('{post}', [PostController::class, 'destroy'])->name('post.destroy');
        //post,put,delete,patch need @csrf
    });
    Route::prefix('comments')->group(function () {                                
        Route::post('blog-comment', [CommentController::class, 'store'])->name('blog-comment');
    }); 

    //author       
     Route::prefix('author')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('author.index');
        Route::get('create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('/', [AuthorController::class, 'store'])->name('author.store');
        Route::get('{author}', [AuthorController::class, 'show'])->name('author.show');
        Route::get('{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
        Route::put('{author}', [AuthorController::class, 'update'])->name('author.update');
        Route::delete('/', [AuthorController::class, 'destroy'])->name('author.destroy');
    });

    //book
    Route::prefix('book')->group(function () {
        Route::post('/', [BookController::class, 'store'])->name('book.store');
        Route::get('{book}', [BookController::class, 'show'])->name('book.show');
    });

    //rate
    Route::prefix('rate')->group(function () {
        Route::post('/', [RetingsController::class, 'store'])->name('rate.store');
    });
    






    
    //student
    Route::resource('classs',ClasssController::class);
    // Route::post('post-comment', [StudentCommentController::class, 'store'])->name('post-comment');

    //client
    Route::resource('client',ClientController::class);
    // Route::post('client-comment',[ClientCommentController::class, 'store'])->name('client-comment');
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
    Route::get('/traits',[NameController::class, 'displaytraitsdata'])->name('traits');
    Route::get('/name',[NameController::class, 'index'])->name('name.index');  //setters route                                                    
    Route::get('/name-firstname',[NameController::class, 'showFirstName'])->name('name-firstname-getname'); //getters route
    Route::get('/name-lastname', [NameController::class, "showLastName"])->name('name-lastname-getnamename');
    Route::get('/name-view/{name}', [NameController::class, 'view'])->name('name-view'); //?

    








    //Rooms
    // Route::resource('room', RoomsController::class);        //route views must the same 
    Route::get('/room',[RoomsController::class, 'index'])->name('room.index');
    Route::get('create', [RoomsController::class, 'create'])->name('room.create');

    //RoomTables
    // Route::resource('room-tables', [RoomTables::class]);             //for routes() use not for view(), if view() use view('layouts.admin.roomtables.index')
    Route::get('/roomtables', [RoomTableController::class, 'index'])->name('roomtables.index');
    Route::get('roomtables.create', [RoomTableController::class, 'create'])->name('roomtables.create');
    Route::post('roomtables.store', [RoomTableController::class, 'store'])->name('roomtables.store');
    Route::get('{roomTable}', [RoomTableController::class, 'show'])->name('roomtables.show');
    Route::get('{roomTable}/edit', [RoomTableController::class, 'edit'])->name('roomtables.edit');
    Route::put('{roomTable}', [RoomTableController::class, 'update'])->name('roomtables.update');
    Route::delete('{roomTable}', [RoomTableController::class, 'destroy'])->name('roomtables.destroy');
               //{roomTable} must the same when filling out ex.{{$roomTable->name}}


    //brand
    // Route::resource('brand', BrandController::class); or you can use resource 
    Route::get('/', [BrandController::class, 'index'])->name('brand.index');    
    Route::get('create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/', [BrandController::class, 'store'])->name('brand.store');

    
    
    

      
    
    


    

});