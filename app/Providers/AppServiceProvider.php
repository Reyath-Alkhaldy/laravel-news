<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categories = Category::all();
        view()->share(['categories'=> $categories]);

        // $settings =     Setting::checkSettings();
        // view()->share(['settings'=> $settings]);
        // dd($settings);
    }
}
