<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        return view('books.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'title'=> 'required|max:30',
            'author'=> 'required|max:20',
            'pages'=> 'nullable|integer|min:1',
            'status'=>'required|in:read,reading,unread'
        ]);

        Book::create($validate);
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit',['book'=> $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate=$request->validate([
            'title'=> 'required|max:30',
            'author'=> 'required|max:20',
            'pages'=> 'nullable|integer|min:1',
            'status'=>'required|in:read,reading,unread'
        ]);

        $book=Book::findOrFail($id);
        $book->update($validate);
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book=Book::findOrFail($id);
        $book->delete();

        return redirect('/books');
    }
}
