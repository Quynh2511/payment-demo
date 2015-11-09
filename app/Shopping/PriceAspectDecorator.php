<?php

namespace App\Shopping;

use App\Contracts\Member\Member;
use App\PriceAspect\PromotionAspect;
use App\PriceAspect\TaxAspect;
use App\Shopping\DurationPromotionFinder\DurationPromotionFinderService;
use App\Shopping\MemberSpecification\MemberSpecification;

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

    protected $memberSpecification;

    /**
     * @param Member $member
     * @param DurationPromotionFinderService $promotionFinderService
     * @param MemberSpecification $memberSpecification
     */
    public function __construct(
        Member                         $member,
        MemberSpecification            $memberSpecification,
        DurationPromotionFinderService $promotionFinderService
    )
    {
        $this->member              = $member;
        $this->memberSpecification = $memberSpecification;
        $this->promotionFinder     = $promotionFinderService;
    }

    /**
     * @param SKU $sku
     */
    public function decorate(SKU $sku)
    {

        $this->memberSpecification->memberType($this->member);

        if ($promotion = $this->promotionFinder->getPromotionFor($sku))
        {
            $sku->setPriceAspect(new PromotionAspect($promotion->getRatio()));
        }

        $sku->setPriceAspect(new TaxAspect(0.1));
    }
}