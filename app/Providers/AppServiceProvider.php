<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use DB;
use App\Models\Support;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $menus = Menu::all();
        // $support = Support::all();
        $menus = DB::table('menus')->orderBy('name', 'desc')->get();
        $support = DB::table('supports')->orderBy('id', 'desc')->take(2)->get();
        view()->share('menus', $menus);
        view()->share('support', $support);
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
