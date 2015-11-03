<?php

namespace App\Contracts\Paying;

/**
 * Interface PaymentHistory
 * @package App\Contracts\Paying
 */
interface PaymentHistory
{
    /**
     * @param Bill $bill
     * @return self
     */
    public function log(Bill $bill);
}