<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Settings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        $settings = Settings::first();
        $features = Feature::all();
        $categories = Category::has('products')->get();
        view()->share('settings', $settings);
        view()->share('features', $features);
        view()->share('categories', $categories);
        Paginator::useBootstrapFive();
    }
}
