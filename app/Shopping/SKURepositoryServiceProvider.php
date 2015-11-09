<?php

namespace App\Shopping;

use App\Member\Member;
use App\Shopping\DurationPromotionFinder\DurationPromotionCache;
use App\Shopping\DurationPromotionFinder\DurationPromotionFinderService;
use Illuminate\Support\ServiceProvider;

class SKURepositoryServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(DurationPromotionFinderService::class, function ()
        {
            $durationPromotionCache = new DurationPromotionCache(\Cache::driver());
            $durationPromotionCache->setExpired(config('promotion.cache-expired', 60 * 24));
            return new DurationPromotionFinderService(\DB::connection(), $durationPromotionCache);
        });

        $this->app->singleton(SKURepository::class, function ()
        {
            return new SKURepository(
                \DB::connection(),
                new SKUFactory(
                    new PriceAspectDecorator(new Member(), $this->app->make(DurationPromotionFinderService::class))
                )
            );
        });
    }

    public function boot()
    {
        /** @var DurationPromotionFinderService $finderService */
        $finderService = $this->app->make(DurationPromotionFinderService::class);
        $finderService->initialize();
    }

    public function provides()
    {
        return [
            SKURepository::class,
            DurationPromotionFinderService::class
        ];
    }
}