<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

public function showCategoryItems($id)
{
    $category = Category::with('items')->findOrFail($id);
    return view('web.items', compact('category'));
}

public function show()
{
    $categories = Category::orderBy('id', 'desc')->get();
    return view('layouts.web', compact('categories'));
}
public function index(Request $request)
{
    $query = Category::latest();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', "%{$search}%");
    }

    $categories = $query->paginate(10)->withQueryString();

    return view('admin.category.index', compact('categories'));
}

public function create()
{
    return view('admin.category.create');
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('category_images', 'public');
    }

    Category::create([
        'name' => $request->name,
        'image' => $imagePath,
    ]);

    return redirect()->route('category.index')->with('success', 'Category added successfully!');
}


public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('admin.category.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $category = Category::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('category_images', 'public');
        $category->image = $imagePath;
    }

    $category->name = $request->name;
    $category->save();

    return redirect()->route('category.index')->with('success', 'Category updated!');
}


public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->route('category.index')->with('success', 'Category deleted!');
}

    
}
