<?php

namespace App\Contracts\PriceCaculation;

/**
 * Interface PriceAware
 * @package Contracts\PriceCaculation
 */
interface PriceAware
{
    public function setPriceAspect(PriceAspect $priceAspect);
}
