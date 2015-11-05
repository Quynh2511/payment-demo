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
     * @param int $skuId
     * @return CartItem
     */
    public function cartItem($skuId);

    /**
     * @return CartItem[]
     */
    public function all();

    /**
     * @param $skuId
     * @return self
     */
    public function remove($skuId);
}