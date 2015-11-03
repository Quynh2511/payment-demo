<?php

namespace App\Contracts\Shopping;

/**
 * Interface CartItem
 * @package App\Contracts\Shopping
 */
interface CartItem
{
    /**
     * @return SKU
     */
    public function sku();

    /**
     * @return int
     */
    public function quantity();
}