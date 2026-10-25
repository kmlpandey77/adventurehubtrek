<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrapFour();

        view()->composer('*', function ($view) {
            $view->with('main_menu', \App\Menu::main());
            $view->with('footer_link', \App\Menu::footer_link());
            $view->with('footer_company_infos', \App\Page::where('parent_id', 18)->active()->orderBy('order_by')->get());
            $view->with('footer_activities', \App\Activity::where('destination_id', 4)->active()->get());
            $view->with('socials', \App\Social::all());
            $view->with('footer_services', \App\Activity::active()->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ImageManager::class, function () {
            return new ImageManager(new Driver());
        });
    }
}
