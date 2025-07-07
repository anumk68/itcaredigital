<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Brand;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
     public function boot(): void
    {
        // Share active brands with all views containing the form
        View::composer('*', function ($view) {
            $brands = Brand::where('status', 'active')->get();
            $view->with('brands', $brands);
        });
    }
}
