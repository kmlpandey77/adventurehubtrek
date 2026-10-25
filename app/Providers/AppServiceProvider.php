<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
    }
}
