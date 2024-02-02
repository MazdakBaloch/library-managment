<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return Inertia::render('Books/Index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::select('id', 'name')->get();
        $authors = Author::select('id', 'first_name', 'last_name')->get();
        $categories = Category::select('id', 'name')->get();
        return Inertia::render('Books/Create', [
            'publishers' => $publishers,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return Inertia::render('Books/Show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::select('id', 'name')->get();
        $authors = Author::select('id', 'first_name', 'last_name')->get();
        $categories = Category::select('id', 'name')->get();
        return Inertia::render('Books/Edit', [
            'book' => $book,
            'publishers' => $publishers,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if($book->delete()){
            return redirect()->route('books.index')->with('success', 'Book deleted successfully');
        }
        return redirect()->route('books.index')->with('fail', 'Something went wrong');
    }
}
