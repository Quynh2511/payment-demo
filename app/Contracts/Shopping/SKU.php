<?php

namespace App\Contracts\Shopping;

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

}