<?php

namespace App\Contracts\Paying;

/**
 * Interface Payment
 * @package App\Contracts\Paying
 */
interface PaymentInterface
{
    /**
     * @param Bill $bill
     * @throws PaymentException
     * @return void
     */
    public function charge(Bill $bill);
}