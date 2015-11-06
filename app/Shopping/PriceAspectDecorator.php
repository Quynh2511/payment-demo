<?php

namespace App\Shopping;

use App\Contracts\Member\Member;
use App\PriceAspect\PromotionAspect;
use App\PriceAspect\TaxAspect;
use App\Shopping\DurationPromotionFinder\DurationPromotionFinderService;

/**
 * Class PriceAspectDecorator
 * @package App\Shopping
 */
class PriceAspectDecorator
{
    /**
     * @var Member
     */
    protected $member;

    /**
     * @var DurationPromotionFinderService
     */
    protected $promotionFinder;

    /**
     * @param Member $member
     * @param DurationPromotionFinderService $promotionFinderService
     */
    public function __construct(Member $member, DurationPromotionFinderService $promotionFinderService)
    {
        $this->member          = $member;
        $this->promotionFinder = $promotionFinderService;
    }

    /**
     * @param SKU $sku
     */
    public function decorate(SKU $sku)
    {
        if ($promotion = $this->promotionFinder->getPromotionFor($sku))
        {
            $sku->setPriceAspect(new PromotionAspect($promotion->getRatio()));
        }

        $sku->setPriceAspect(new TaxAspect(0.1));
    }
}