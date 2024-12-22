<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryList = Category::all();
        return view('category.index', [
            'categories' => $categoryList
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $category->save();

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }
    
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
    
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }

        $category->delete();
    
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    // public function show($id)
    // {
    //     $category = Category::find($id);
    //     if (!$category) {
    //         return redirect()->route('category.index')->with('error', 'Category not found.');
    //     }
    //     return view('category.show', compact('category'));
    // }
}
