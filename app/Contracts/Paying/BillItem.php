<?php

namespace App\Contracts\Paying;
use App\Contracts\Shopping\SKU;

/**
 * Interface BillItem
 * @package App\Contracts\Paying
 */
interface BillItem
{

    /**
     * @return SKU
     */
    public function sku();

    /**
     * @return int
     */
    public function quantity();

    /**
     * @return float
     */
    public function totalAmount();

    /**
     * @return float
     */
    public function getTotalAmount();
}