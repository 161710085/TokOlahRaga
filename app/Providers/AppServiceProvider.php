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
        view()->composer('partial.header',function ($view){
            $kategori = \App\kategori::all();
             $jenis=\App\jenis::all();
            $recent = \App\barang::orderBy('created_at','desc')->take(3)->get();
            $view->with(compact('kategori','recent','jenis'));
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
