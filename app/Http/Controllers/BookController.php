<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('getAuthor', 'getRates')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        return view('layouts.admin.book.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        return view('layouts.admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $author = Author::create([
            'name' => $request->input('author_id'),
        ]);     

        Book::create([
            'author_id' => $author->id,
            'name' => $request->input('name'),
        ]);

        return redirect()->route('book.index')->with('book', 'Books Succesfully created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */

    //Rate books
    public function show(Book $book)
    {
        $author = Author::find($book->author_id);

        return view('layouts.admin.book.show', [
            'book' => $book,
            'author' => $author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // $books = Book::find($book);

        return view('layouts.admin.book.edit', [
            'books' => $book,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
        
        $book = Book::find($id);       
        $author = Author::find($book->author_id);

       if($book){
        $book->name = $request->input('name');
        $book->author_id = $request->input('author_id');
        $book->save();        
       }

       if($author) {
        $author->name = $request->input('author');
        $author->save();
       }
        

        // $author = Author::where('id', $request->input('author_id'))->get();
        // if($author){
        //     $author->name = $request->input('author');
        //     $author->save();
           
        // }
      
        // $author->update([
        //     'name' => $request->input('author')
        // ]);         

        // $book->name = $request->input('name');
        // $book->author_id = $author->id;
        // $book->save();

        return redirect()->route('book.index')->with('edit', 'Records successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('delete', 'Records successfully deleted');
    }

    public function addbook($id)
    {
        $author = Author::find($id);
        
        return view('layouts.admin.book.addbook', [
            'author' => $author
        ]);
    }

    public function storebook(Request $request) 
    {
        Book::create([
            'name' => $request->input('name'),
            'author_id' => $request->input('author_id'),
        ]);

        return redirect()->route('book.index')->with('edit', 'Book successfully added');
    }
}
