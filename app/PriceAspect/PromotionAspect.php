<?php

namespace App\PriceAspect;

use App\Contracts\PriceCaculation\PriceAspect;
use App\Contracts\PriceCaculation\PriceAspectType;

/**
 * Class PromotionAspect
 * @package App\PriceAspect
 */
class PromotionAspect implements PriceAspect
{
    /**
     * @var
     */
    protected $ratio;

    /**
     * @param $ratio
     */
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

    /**
     * @return string
     */
    public function name()
    {
        return 'Independent Day Sale Off';
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->ratio;
    }

    /**
     * @return string
     */
    public function type()
    {
        return PriceAspectType::TYPE_PROMOTE;
    }
}