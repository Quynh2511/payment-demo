<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/5/15
 * Time: 5:09 PM
 */

namespace App\Payment;


use Illuminate\Support\ServiceProvider;

class BillRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(BillRepository::class, function ()
        {
            return new BillRepository(\DB::connection(),new BillReader());
        });
    }
}