<?php

namespace App\Shopping;

use App\Contracts\Shopping\Cart as CartInterface;
use App\Contracts\Shopping\CartItem;

/**
 * Class Cart
 * @package App\Shopping
 */
class Cart implements CartInterface
{
    /**
     * @var CartItem[]
     */
    protected $cartItems;

    /**
     * @param CartItem $cartItem
     * @return self
     */
    public function setCartItem(CartItem $cartItem)
    {
        $this->cartItems[$cartItem->sku()->id()] = $cartItem;

        return $this;
    }

    /**
     * @param int $skuId
     * @param CartItem|null $default
     * @return CartItem
     */
    public function cartItem($skuId, CartItem $default = null)
    {
        if (array_key_exists($skuId, $this->cartItems))
        {
            return $this->cartItems[$skuId];
        }

        return $default;
    }

    /**
     * @return CartItem[]
     */
    public function all()
    {
        return $this->cartItems;
    }

    /**
     * @param $skuId
     * @return self
     */
    public function remove($skuId)
    {
        if (array_key_exists($skuId, $this->cartItems))
        {
            unset($this->cartItems[$skuId]);
        }

        return $this;
    }
}