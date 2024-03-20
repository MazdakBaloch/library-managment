<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Language/Index',[
            'languages' => Language::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Language/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_dash|min:2|max:30|unique:languages,name'
        ]);
        $new_language = new Language();
        $new_language->name = ucfirst($request->name);
        if($new_language->save()){
            return redirect()->back()->with('success','Language added successfully');
        }
        return redirect()->back()->with('success','Somthing went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        return Inertia::render('Language/Show',[
            'language' => $language
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return Inertia::render('Language/Edit',
        [
            'language' => $language
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required|alpha_dash|min:2|max:30|unique:languages,name'. $language->id
        ]);
        $language->name = ucfirst($request->name);
        if($language->save()){
            return redirect()->back()->with('success','Language updated successfully');
        }
        return redirect()->back()->with('success','Somthing went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        if($language->delete()){
            return redirect()->back()->with('success','Language removed successfully');
        }
        return redirect()->back()->with('success','Somthing went wrong');
    }
}
