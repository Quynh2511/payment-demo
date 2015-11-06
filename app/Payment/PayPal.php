<?php

namespace App\Payment;


use App\Contracts\Paying\Bill;
use App\Contracts\Paying\PaymentException;
use App\Contracts\Paying\Payment as PaymentInterface;

/**
 * Class PayPal
 * @package App\Payment
 */
class PayPal implements PaymentInterface
{

    /**
     * @param Bill $bill
     * @throws PaymentException
     * @return void
     */
    public function charge(Bill $bill)
    {
        // TODO: Implement charge() method.
    }
}