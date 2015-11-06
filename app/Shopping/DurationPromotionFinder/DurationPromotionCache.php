<?php

namespace App\Shopping\DurationPromotionFinder;

use Illuminate\Contracts\Cache\Repository;

/**
 * Class DurationPromotionCache
 * @package App\Shopping
 */
class DurationPromotionCache
{
    /**
     * @var Repository
     */
    protected $cache;

    /**
     * @var int
     */
    protected $expired = 60 * 24;

    /**
     * @param Repository $cache
     */
    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param int $minutes
     */
    public function setExpired($minutes)
    {
        $this->expired = $minutes;
    }

    /**
     * @return DurationPromotion[]
     */
    public function get()
    {
        $promotions = $this->cache->get('promotions');

        if ($promotions && $this->cache->get('promotions.today') == date('Y-m-d'))
        {
            return $promotions;
        }

        return null;
    }

    /**
     * @param DurationPromotion[]
     */
    public function put($promotions)
    {
        $this->cache->put('promotions', $promotions, $this->expired);
        $this->cache->put('promotions.today', date('Y-m-d'), $this->expired);
    }

}