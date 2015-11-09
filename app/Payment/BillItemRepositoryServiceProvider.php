<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/9/15
 * Time: 11:30 AM
 */

namespace App\Payment;


use Illuminate\Support\ServiceProvider;

class BillItemRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BillRepository::class, function ()
        {
            return new BillItemRepository(\DB::connection(),new BillItemFactory());
        });
    }
}