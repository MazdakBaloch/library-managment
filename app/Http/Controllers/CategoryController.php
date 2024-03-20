<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id','name')->latest('created_at')->paginate(10);
        return Inertia::render('Category/Index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_dash|min:3|max:20|unique:categories,name'
        ],
        [
           'name.unique' => 'Category already exists'
        ]);
        
        $new_category = new Category();
        $new_category->name = ucfirst($request->name);
        if($new_category->save()){
            return redirect()->route('categories.index')->with('success','Category created successfully!');
        } 
        return redirect()->route('categories.index')->with('fail','Something went wrong,try again');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return Inertia::render('Category.Show',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3|max:20|alpha_dash|unique:categories,name,' .$category->id
        ],
         [
            'name.unique' => 'Category already exists'
         ]);
        $category->name = ucfirst($request->name);
        if($category->save()){

            return redirect()->route('categories.index')->with('success','Category updated successfully!');
        }
        return redirect()->route('categories.index')->with('fail','Something went wrong,try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('categories.index')->with('success','Category deleted successfully!');
        }
        return redirect()->route('categories.index')->with('fail','Something went wrong,try again');
    }
}
