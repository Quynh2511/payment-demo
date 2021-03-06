<?php

namespace App\Contracts\Paying;

/**
 * Interface Bill
 * @package App\Contracts\Paying
 */
interface Bill
{
    /**
     * @param BillItem $billItem
     * @return self
     */
    public function setBillItem(BillItem $billItem);

    /**
     * @return float
     */
    public function price();
}