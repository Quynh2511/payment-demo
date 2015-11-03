<?php

namespace App\Contracts\Shopping;
use App\Contracts\PriceCaculation\PriceAspect;

/**
 * Interface Product
 * @package App\Contracts
 */
/**
 * Interface SKU
 * @package App\Contracts\Shopping
 */
interface SKU
{
    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function name();

    /**
     * @return float
     */
    public function originPrice();

    /**
     * @return float
     */
    public function price();

    /**
     * @param PriceAspect $priceAspect
     * @return self
     */
    public function setPriceAspect(PriceAspect $priceAspect);
}