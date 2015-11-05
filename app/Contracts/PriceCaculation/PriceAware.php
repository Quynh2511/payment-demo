<?php

namespace Contracts\PriceCaculation;

use App\Contracts\PriceCaculation\PriceAspect;

/**
 * Interface PriceAware
 * @package Contracts\PriceCaculation
 */
interface PriceAware
{
    public function setPriceAspect(PriceAspect $priceAspect);
}
