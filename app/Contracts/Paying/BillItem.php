<?php

namespace App\Contracts\Paying;

/**
 * Interface BillItem
 * @package App\Contracts\Paying
 */
interface BillItem
{
    /**
     * @return string
     */
    public function name();

    /**
     * @return int
     */
    public function quantity();

    /**
     * @return float
     */
    public function price();

    /**
     * @return float
     */
    public function totalAmount();
}