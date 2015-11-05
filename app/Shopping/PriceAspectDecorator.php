<?php

namespace App\Shopping;

use App\Contracts\Member\Member;
use App\Contracts\PriceCaculation\PriceAware;
use App\PriceAspect\TaxAspect;
use App\PriceAspect\VipAspect;

class PriceAspectDecorator
{
    protected $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function decorate(PriceAware $priceAware)
    {
        //TODO must implement logic for price aspect
        $priceAware->setPriceAspect(new TaxAspect(0.1))->setPriceAspect(new VipAspect(0.3));
    }
}