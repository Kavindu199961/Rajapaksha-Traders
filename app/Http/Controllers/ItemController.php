<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function show(Item $item)
{
    return view('web.show', compact('item'));
}

public function index(Request $request)
{
    $query = Item::with('category')->latest();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', "%{$search}%");
    }

    $items = $query->paginate(10)->withQueryString();

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

    public function search(Request $request)
{
    $query = $request->input('query');

    $items = Item::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->paginate(12); 

    return view('web.search_results', compact('items', 'query'));
}

public function allProducts()
{
    $items = Item::paginate(20); // 20 items per page
    return view('web.product', compact('items'));
}

}
