<?php

namespace App\Payment;

use Illuminate\Support\ServiceProvider;

class BillRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(BillRepository::class, function ()
        {
            return new BillRepository(\DB::connection(),new BillReader(), new BillFactory());
        });
    }
}