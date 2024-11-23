<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::where('user_id', Auth::id())->paginate(10);
        $user = Auth::user();
        return view('category.index', compact('categories', 'user'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1:0,
            'user_id' => Auth::id(),
        ]);

        return redirect('/category')->with('status', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        if($category->user_id !== Auth::id()){
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1:0,
        ]);

        return redirect('/category')->with('status', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $category->delete();
        return redirect('/category')->with('status', 'Category Deleted Successfully');
    }
}
