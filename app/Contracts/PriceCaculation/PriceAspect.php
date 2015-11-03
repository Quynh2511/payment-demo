<?php

namespace App\Contracts\PriceCaculation;

/**
 * Interface PriceAspect
 * @package App\Contracts\PriceCaculation
 */
interface PriceAspect
{
    /**
     * @param float $price
     * @return float
     */
    public function alter($price);
}