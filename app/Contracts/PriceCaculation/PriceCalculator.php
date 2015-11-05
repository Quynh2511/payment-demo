<?php

namespace Contracts\PriceCaculation;

use App\Contracts\Shopping\CartItem;

/**
 * Interface PriceCalculator
 * @package Contracts\PriceCaculation
 */
interface PriceCalculator
{
    /**
     * @param CartItem $cartItem
     * @return float
     */
    public function calculate(CartItem $cartItem);
}