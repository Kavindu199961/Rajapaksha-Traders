<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; // <-- Add this line
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('partials.category-nav', function ($view) {
            $view->with('categories', \App\Models\Category::all());
        });
    }
}