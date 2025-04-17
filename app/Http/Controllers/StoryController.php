<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class StoryController extends Controller
{
    public function show()
{
    $stories = Story::with('galleries')
                ->where('is_active', true)
                ->latest()
                ->get(); // Change first() to get() to fetch all stories
    $categories = Category::orderBy('created_at', 'desc')->get();

    
    return view('web.story', compact('stories', 'categories'));
}

    public function index()
    {
        $stories = Story::with('galleries')->latest()->get();
        return view('admin.story.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.story.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'is_active']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('stories', 'public');
        }

        $story = Story::create($data);

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('story_gallery', 'public');
                $story->galleries()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('story.index')->with('success', 'Story created successfully.');
    }

    public function edit(Story $story)
    {
        $story->load('galleries');
        return view('admin.story.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'is_active']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($story->image) {
                Storage::disk('public')->delete($story->image);
            }
            $data['image'] = $request->file('image')->store('stories', 'public');
        }

        $story->update($data);

        // Handle new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('story_gallery', 'public');
                $story->galleries()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('story.index')->with('success', 'Story updated successfully.');
    }

    public function destroyGalleryImage(StoryGallery $galleryImage)
    {
        Storage::disk('public')->delete($galleryImage->image_path);
        $galleryImage->delete();
        
        return back()->with('success', 'Gallery image deleted successfully.');
    }

    public function destroy(Story $story)
    {
        // Delete main image
        if ($story->image) {
            Storage::disk('public')->delete($story->image);
        }
        
        // Delete gallery images
        foreach ($story->galleries as $gallery) {
            Storage::disk('public')->delete($gallery->image_path);
            $gallery->delete();
        }
        
        $story->delete();

        return redirect()->route('story.index')->with('success', 'Story deleted successfully.');
    }
}