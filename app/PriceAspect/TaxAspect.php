<?php

namespace App\PriceAspect;

use App\Contracts\PriceCaculation\PriceAspect;
use App\Contracts\PriceCaculation\PriceAspectType;

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

    /**
     * @return string
     */
    public function name()
    {
        return 'VAT';
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->tax;
    }

    /**
     * @return string
     */
    public function type()
    {
        return PriceAspectType::TYPE_TAX;
    }


}