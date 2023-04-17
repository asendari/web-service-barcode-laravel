<?php

namespace Asendari\WebServiceBarcode;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;


class ServiceProvider extends IlluminateServiceProvider {

    public function register(): void
    {}

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/barcode.php' => config_path('barcode.php'),
        ], 'config');
    }
}