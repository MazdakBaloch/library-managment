<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::latest()->paginate(10);
        
        return Inertia::render('Author/Index',[
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Author/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|alpha|min:3|max:30',
            'lastName' => 'max:30'
        ]);

        $new_author = new Author();
        $new_author->first_name = ucfirst($request->firstName);
        $new_author->last_name = ucfirst($request->lastName);
        if($new_author->save()){
            return redirect()->back()->with('success','Author added successfully');
        }
        return redirect()->back()->with('success','Somthing went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return Inertia::render('Author/Show',[
            'author' => $author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return Inertia::render('Author/Edit',[
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Author $author)
    {
        $request->validate([
            'firstName' => 'required|alpha|min:3|max:30',
            'lastName' => 'alpha|max:30'
        ]);
        $author->first_name = ucfirst($request->firstName);
        $author->last_name = ucfirst($request->lastName);
        if($author->save()){
            return redirect()->back()->with('success','Author updated successfully');
        }
        return redirect()->back()->with('success','Somthing went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if($author->delete()){
            return redirect()->back()->with('success','Author removed successfully');
        }
        return redirect()->back()->with('success','Somthing went wrong');
    }
}
