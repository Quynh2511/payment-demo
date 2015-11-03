<?php

namespace Contracts\Product;

use App\Contracts\Paying\BillItem;
use App\Contracts\Shopping\CartItem;
use App\Contracts\Shopping\SKU;

class Product implements BillItem, CartItem
{
    /**
     * @return SKU
     */
    public function sku()
    {
        // TODO: Implement product() method.
    }

    /**
     * @return int
     */
    public function quantity()
    {
        // TODO: Implement quantity() method.
    }

    /**
     * @return string
     */
    public function name()
    {
        // TODO: Implement name() method.
    }

    /**
     * @return float
     */
    public function price()
    {
        // TODO: Implement price() method.
    }

    /**
     * @return float
     */
    public function totalAmount()
    {
        // TODO: Implement totalAmount() method.
    }
}