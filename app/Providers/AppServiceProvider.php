<?php

namespace App\Providers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('items')) {
            $categories = Item::select('items.gender', 'categories.name', 'categories.id')
                ->join('categories', 'items.category_id', '=', 'categories.id')
                ->distinct()
                ->get();
            View::share('overlayCategories', $categories);
        }

        Paginator::defaultView('vendor/pagination/default');
    }
}
