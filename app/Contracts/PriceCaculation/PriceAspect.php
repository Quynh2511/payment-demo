<?php

namespace App\Contracts\PriceCaculation;

/**
 * Interface PriceAspect
 * @package App\Contracts\PriceCaculation
 */
interface PriceAspect
{
    /**
     * @return string
     */
    public function name();

    /**
     * @return mixed
     */
    public function value();

    /**
     * @return string
     */
    public function type();

    /**
     * @param float $price
     * @return float
     */
    public function alter($price);
}