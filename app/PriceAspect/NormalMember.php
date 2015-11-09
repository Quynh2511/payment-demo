<?php

namespace App\PriceAspect;

use App\Contracts\PriceCaculation\PriceAspect;
use App\Contracts\PriceCaculation\PriceAspectType;

class NormalMember implements PriceAspect
{
    /**
     * @return string
     */
    public function name()
    {
        return 'Member';
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return 0;
    }

    /**
     * @return string
     */
    public function type()
    {
        return PriceAspectType::TYPE_MEMBER;
    }

    /**
     * @param float $price
     * @return float
     */
    public function alter($price)
    {
        return $price;
    }

}