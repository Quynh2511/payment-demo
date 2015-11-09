<?php

namespace App\Shopping\DurationPromotionFinder;

use App\Contracts\Shopping\SKU;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Database\Connection;

/**
 * Class DurationPromotionFinderService
 * @package App\Shopping
 */
class DurationPromotionFinderService
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var DurationPromotion[]
     */
    protected $hasPromotionToday = [];

    /**
     * @var Repository
     */
    protected $cache;

    /**
     * @param Connection $connection
     * @param DurationPromotionCache $cache
     */
    public function __construct(Connection $connection, DurationPromotionCache $cache)
    {
        $this->connection = $connection;
        $this->cache      = $cache;
    }

    /**
     *
     */
    public function initialize()
    {
        $this->hasPromotionToday = $this->cache->get();

        if ($this->hasPromotionToday)
        {
            \Log::debug('Promotion cache hit!');

            return;
        }
        else
        {
            \Log::debug('Promotion cache miss!');

            $productsInPromotion = $this->connection
                ->query()
                ->from('duration_promotion')
                ->select(['id', 'begin', 'end', 'product_id', 'percentage'])
                ->get();
            ;

            $this->hasPromotionToday = $this->filterByToday($productsInPromotion);

            $this->cache->put($this->hasPromotionToday);
        }
    }

    /**
     * @param $raw
     * @return array
     */
    protected function filterByToday($raw)
    {
        $today              = Carbon::now();
        $builtPromotionList = [];

        $filterred = array_filter($raw, function($row) use ($today) {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->begin);
            $endDate   = Carbon::createFromFormat('Y-m-d H:i:s', $row->end);

            return $today->between($startDate, $endDate);
        });

        array_walk($filterred, function ($row) use (&$builtPromotionList) {
            $builtPromotionList[$row->product_id] = DurationPromotion::create(
                floatval($row->percentage),
                Carbon::createFromFormat('Y-m-d H:i:s', $row->begin),
                Carbon::createFromFormat('Y-m-d H:i:s', $row->end),
                intval($row->product_id)
            );
        });

        return $builtPromotionList;
    }

    /**
     * @param SKU $sku
     * @return DurationPromotion
     */
    public function getPromotionFor(SKU $sku)
    {
        if (array_key_exists($sku->id(), $this->hasPromotionToday()))
        {
            return $this->hasPromotionToday()[$sku->id()];
        };

        return null;
    }

    /**
     * @return array
     */
    public function hasPromotionToday()
    {
        return $this->hasPromotionToday;
    }
}