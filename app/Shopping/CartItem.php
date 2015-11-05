<?php

namespace App\Shopping;

use App\Contracts\Shopping\CartItem as CartItemInterface;
use App\Contracts\Shopping\SKU;

/**
 * Class CartItem
 * @package App\Shopping
 */
class CartItem implements CartItemInterface
{
    /**
     * @var SKU
     */
    protected $SKU;

    /**
     * @var
     */
    protected $quantity;

    /**
     * @param SKU $SKU
     * @param $quantity
     */
    public function __construct(SKU $SKU, $quantity)
    {
        $this->SKU      = $SKU;
        $this->quantity = $quantity;
    }

    /**
     * @return SKU
     */
    public function sku()
    {
        return $this->SKU;
    }

    /**
     * @return int
     */
    public function quantity()
    {
        return $this->quantity;
    }
}