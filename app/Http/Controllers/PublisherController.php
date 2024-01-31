<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::paginate(10);
        return Inertia::render('Publisher/Index', [
            'publisher' => $publishers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Publisher/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:publishers,name|max:255'
        ]);
        $new_publisher = new Publisher();
        $new_publisher->name = ucfirst($request->name);
        if ($new_publisher->save()) {
            return redirect()->back()->with('succsess', 'Publisher added successfully!');
        }
        return redirect()->back()->with('fail', 'Somthing went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return Inertia::render('Publisher/Show', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return Inertia::render('Publisher/Edit', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:publishers,name' . $publisher->id,
        ]);
        $publisher->name = ucfirst($request->name);
        if ($publisher->save()) {
            return redirect()->with('success', 'Publisher updated successfully');
        }
        return redirect()->back()->with('fail', 'Somthing went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        if ($publisher->delete()) {
            return redirect()->back()->with('success', 'Publisher deleted successfully!');
        }
        return redirect()->back()->with('fail', 'Somthing went wrong');
    }
}
