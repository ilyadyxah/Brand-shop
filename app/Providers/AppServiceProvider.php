<?php

namespace App\Providers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Items::select('items.gender', 'categories.name', 'categories.id')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->distinct()
            ->get();
        View::share('overlayCategories', $categories);
    }
}
