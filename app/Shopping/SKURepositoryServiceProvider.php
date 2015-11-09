<?php

namespace App\Shopping;

use App\Member\Member;
use App\Shopping\DurationPromotionFinder\DurationPromotionCache;
use App\Shopping\DurationPromotionFinder\DurationPromotionFinderService;
use App\Shopping\MemberSpecification\MemberSpecification;
use Illuminate\Support\ServiceProvider;

/**
 * Class SKURepositoryServiceProvider
 * @package App\Shopping
 */
class SKURepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Register services for Shoping packages
     */
    public function register()
    {
        $this
            ->registerPromotionFinder()
            ->registerSKUFactory()
            ->registerSKURepository()
        ;

    }

    /**
     * @return self
     */
    protected function registerPromotionFinder()
    {
        $this->app->singleton(DurationPromotionFinderService::class, function ()
        {
            $durationPromotionCache = new DurationPromotionCache(\Cache::driver());
            $durationPromotionCache->setExpired(config('promotion.cache-expired', 60 * 24));

            return new DurationPromotionFinderService(\DB::connection(), $durationPromotionCache);
        });

        return $this;
    }

    /**
     * @return self
     */
    protected function registerSKUFactory()
    {
        $this->app->singleton(SKUFactory::class, function ()
        {
            /** @var DurationPromotionFinderService $finderService */
            $finderService = $this->app->make(DurationPromotionFinderService::class);
            $finderService->initialize();

            return new SKUFactory(
                new PriceAspectDecorator(
                    new Member(),
                    $finderService,
                    new PriceAspectFromMemberFactory()
                )
            );
        });

        return $this;
    }

    /**
     * @return self
     */
    protected function registerSKURepository()
    {
        $this->app->singleton(SKURepository::class, function ()
        {
            /** @var DurationPromotionFinderService $finderService */
            $finderService = $this->app->make(DurationPromotionFinderService::class);
            $finderService->initialize();

            return new SKURepository(
                \DB::connection(),
                $this->app->make(SKUFactory::class)
            );
        });

        return $this;
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            SKURepository::class,
            DurationPromotionFinderService::class,
            SKUFactory::class
        ];
    }
}