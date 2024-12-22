<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Rules\Uppercase;

class FoodController extends Controller
{
    public function index()
    {
        $foodList = Food::all();
        return view('food.index', [
            'foods' => $foodList
        ]);
    }

    // Redirect to Create Food Page
    public function create()
    {
        $categories = Category::all();
        return view('food.create')->with('categories', $categories);
    }

    // Redirect to List Food Page after creating a new food
    public function store(Request $request)
    {


        $request->validate([
            'name' => new Uppercase,
            'count' => 'required|integer|min:0|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $food = Food::create([
            'name' => $request->name,
            'count' => $request->count,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image_path' => $imageName,
        ]);

        $food->save();

        return redirect()->route('food.index');
    }

    // Redirect to Edit Food Page with current food data
    public function edit($id)
    {
        $food = Food::find($id);
        if (!$food) {
            return redirect()->route('food.index')->with('error', 'Food not found.');
        }
        $categories = Category::all();
        return view('food.edit', compact('food', 'categories'));
    }
    

    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        if (!$food) {
            return redirect()->route('food.index')->with('error', 'Food not found.');
        }

        $request->validate([
            'name' => new Uppercase,
            'count' => 'required|integer|min:0|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
    
        // Update variables
        $food->name = $request->input('name');
        $food->count = $request->input('count');
        $food->description = $request->input('description');

        // Update category
        $food->category_id = $request->input('category_id');

        // Save value before updating
        $food->save();
        return redirect()->route('food.index')->with('success', 'Food updated successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $food = Food::find($id);
        if (!$food) {
            return redirect()->route('food.index')->with('error', 'Food not found.');
        }

        $food->delete();
        return redirect()->route('food.index')->with('success', 'Food updated successfully!');
    }
    
    public function show($id)
    {
        $food = Food::find($id);
        if (!$food) {
            return redirect()->route('food.index')->with('error', 'Food not found.');
        }
        $category = Category::find($food->category_id);
        $food->category = $category;
        return view('food.show', compact('food'));
    }
}
