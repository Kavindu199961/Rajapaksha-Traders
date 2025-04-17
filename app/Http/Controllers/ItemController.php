<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function show(Item $item)
{
    return view('admin.item.show', compact('item'));
}

    public function index()
    {
        $items = Item::with('category')->get();
        return view('admin.item.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'regular_price' => 'required|numeric',
            'real_price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
        }

        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'regular_price' => $request->regular_price,
            'real_price' => $request->real_price,
            'image' => $imagePath,
        ]);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.item.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'regular_price' => 'required|numeric',
            'real_price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $item->image = $request->file('image')->store('items', 'public');
        }

        $item->update($request->only('name', 'description', 'category_id', 'regular_price', 'real_price', 'image'));

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted.');
    }
}
