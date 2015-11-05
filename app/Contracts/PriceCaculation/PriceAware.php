<?php

namespace App\Contracts\PriceCaculation;

/**
 * Interface PriceAware
 * @package Contracts\PriceCaculation
 */
interface PriceAware
{
    /**
     * @param PriceAspect $priceAspect
     * @return self
     */
    public function setPriceAspect(PriceAspect $priceAspect);
}
