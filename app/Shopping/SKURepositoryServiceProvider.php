<?php

namespace App\Shopping;

use Illuminate\Support\ServiceProvider;

class SKURepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SKURepository::class, function ()
        {
            return new SKURepository(\DB::connection(), new SKUFactory());
        });
    }
}