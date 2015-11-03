<?php

namespace App\Contracts\Shopping;

/**
 * Interface Cart
 * @package App\Contracts\Shopping
 */
interface Cart
{
    /**
     * @param CartItem $cartItem
     * @return self
     */
    public function setCartItem(CartItem $cartItem);

    /**
     * @return CartItem
     */
    public function cartItem();

    /**
     * @param $productId
     * @return self
     */
    public function remove($productId);
}