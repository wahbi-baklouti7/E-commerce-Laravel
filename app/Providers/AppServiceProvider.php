<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
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
        //
        $categories=Category::all();
        // $card = session()->get('card', []);
        // dd($card);
        view()->share('categories', $categories);

        $threshold= 3;
        config(['threshold' => $threshold]);


        // View::share('categories', $categories);
    }
}
