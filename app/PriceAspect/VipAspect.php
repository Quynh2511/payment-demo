<?php
/**
 * Created by PhpStorm.
 * User: tienvm
 * Date: 11/5/15
 * Time: 10:05 AM
 */

namespace App\PriceAspect;


use App\Contracts\PriceCaculation\PriceAspect;

class VipAspect implements PriceAspect
{
    protected $ratio;

    public function __construct($ratio)
    {
        $this->ratio = $ratio;
    }
    /**
     * @param float $price
     * @return float
     */
    public function alter($price)
    {
        return $price * (1 - $this->ratio);
    }
}