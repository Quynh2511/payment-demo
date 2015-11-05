<?php

namespace App\PriceAspect;

use App\Contracts\PriceCaculation\PriceAspect;

class TaxAspect implements PriceAspect
{
    /**
     * @var float
     */
    protected $tax;

    /**
     * @param float $tax
     */
    public function __construct($tax)
    {
        $this->tax = $tax;
    }

    /**
     * @param float $price
     * @return float
     */
    public function alter($price)
    {
        return $price * (1 + $this->tax);
    }
}