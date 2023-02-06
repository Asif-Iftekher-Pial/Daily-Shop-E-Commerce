<?php

namespace App\Providers;

use CategoryComposer;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        View::composer('frontend.master.master', function ($view) {
            $dataCat = Category::with('subCats')->get();
            $view->with('dataCat', $dataCat);
        });
        
    }
}
