<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/5/15
 * Time: 10:18 AM
 */

namespace App\Payment;


use App\Contracts\Paying\Bill;
use App\Contracts\Paying\PaymentException;
use App\Contracts\Paying\PaymentInterface;

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