<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->get();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('ads', 'public');

        Ad::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('ads.index')->with('success', 'Ad created successfully.');
    }

    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ads', 'public');
            $ad->image = $imagePath;
        }

        $ad->title = $request->title;
        $ad->save();

        return redirect()->route('ads.index')->with('success', 'Ad updated successfully.');
    }
}
