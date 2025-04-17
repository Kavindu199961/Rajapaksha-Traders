<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\AdsController;
use App\Models\Ad;
use App\Http\Controllers\ItemController;
use App\Models\Item;
use App\Http\Controllers\StoryController;
use App\Models\Story;
use App\Http\Controllers\TransportBookController;

// Ensure the StoryController class exists in the specified namespace
// If it doesn't exist, create it in the App\Http\Controllers directory


Route::get('/', function () {
    $categories = Category::orderBy('created_at', 'desc')->get();
    $ads = Ad::orderBy('created_at', 'desc')->get();
    $items = Item::orderBy('created_at', 'desc')->get();
    return view('web.index', compact('categories', 'ads', 'items'));
});

Route::get('/about', function () {
    return view('web.about');
});

Route::get('/contact', function () {
    return view('web.contact');
});

Route::get('/transport', function () {
    return view('web.transport');
});

Route::get('/story', [StoryController::class, 'show'])->name('web.story.show');

Route::get('/category/{id}', [CategoryController::class, 'showCategoryItems'])->name('admin.category.items');



Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::prefix('admin')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


        //ads route
     
        Route::get('ads', [AdsController::class, 'index'])->name('ads.index');
        Route::get('ads/create', [AdsController::class, 'create'])->name('ads.create');
        Route::post('ads', [AdsController::class, 'store'])->name('ads.store');
        Route::get('ads/{ad}/edit', [AdsController::class, 'edit'])->name('ads.edit');
        Route::put('ads/{ad}', [AdsController::class, 'update'])->name('ads.update');
        Route::delete('ads/{ad}', [AdsController::class, 'destroy'])->name('ads.destroy');

        //items route
        Route::get('items', [ItemController::class, 'index'])->name('items.index');
        Route::get('items/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('items', [ItemController::class, 'store'])->name('items.store');
        Route::get('items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
        Route::put('items/{item}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
        Route::get('items/{item}', [ItemController::class, 'show'])->name('items.show');
        
        //story route
        Route::get('story', [StoryController::class, 'index'])->name('story.index');
        Route::get('story/create', [StoryController::class, 'create'])->name('story.create');
        Route::post('story', [StoryController::class, 'store'])->name('story.store');
        Route::get('story/{story}/edit', [StoryController::class, 'edit'])->name('story.edit');
        Route::put('story/{story}', [StoryController::class, 'update'])->name('story.update');
        Route::delete('story/{story}', [StoryController::class, 'destroy'])->name('story.destroy');


        Route::delete('/story/gallery/{galleryImage}', [StoryController::class, 'destroyGalleryImage'])
    ->name('story.destroyGalleryImage');

    

    });

    // Public booking form
Route::post('/hire', [TransportBookController::class, 'store'])->name('transport.store');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/transport', [TransportBookController::class, 'index'])->name('transport.index');
    Route::post('/transport/{id}/complete', [TransportBookController::class, 'complete'])->name('transport.complete');
    Route::delete('/transport/{id}', [TransportBookController::class, 'destroy'])->name('transport.destroy');
});


    
});

require __DIR__.'/auth.php';
