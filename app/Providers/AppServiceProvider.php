<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\Config;

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
        view()->share('config', Config::find(1));
        view()->share('emails', Contact::where('read', 0)->get());
        Route::resourceVerbs([
            'create' => 'olustur',
            'edit' => 'guncelle'
        ]);
    }
}
