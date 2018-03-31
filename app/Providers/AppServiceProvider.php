<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    //use Braintree_Configuration;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \Braintree_Configuration::environment(config('sandbox'));
        \Braintree_Configuration::merchantId(config('w7bpvk84t4ppk9sd'));
        \Braintree_Configuration::publicKey(config('b8wsk8jbnfrfgxf4'));
        \Braintree_Configuration::privateKey(config('15847ecae0a7e84acaa7b33d79f9ab65'));
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
