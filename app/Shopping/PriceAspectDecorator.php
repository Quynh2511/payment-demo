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
     * @var PriceAspectFromMemberFactory
     */
    protected $factory;

    /**
     * @param Member $member
     * @param DurationPromotionFinderService $promotionFinderService
     * @param PriceAspectFromMemberFactory $aspectFromMemberFactory
     */
    public function __construct(
        Member                         $member,
        DurationPromotionFinderService $promotionFinderService,
        PriceAspectFromMemberFactory   $aspectFromMemberFactory
    )
    {
        $this->member              = $member;
        $this->promotionFinder     = $promotionFinderService;
        $this->factory             = $aspectFromMemberFactory;
    }

    /**
     * @param SKU $sku
     */
    public function decorate(SKU $sku)
    {
        foreach($this->member->memberType() as $memberType)
        {
            $priceAspect = $this->factory->makePriceAspect($memberType);
            $sku->setPriceAspect($priceAspect);
        }

        if ($promotion = $this->promotionFinder->getPromotionFor($sku))
        {
            $sku->setPriceAspect(new PromotionAspect($promotion->getRatio()));
        }

        $sku->setPriceAspect(new TaxAspect(0.1));
    }
}