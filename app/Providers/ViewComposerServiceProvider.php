<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Models\Category;
use App\Course;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('layouts.app4', function($view){
        $view->with('categories', Category::all())
        ->with('coursp',Course::inRandomOrder()->take(5)->get());
      });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
