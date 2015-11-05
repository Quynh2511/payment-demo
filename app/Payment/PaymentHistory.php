<?php
/**
 * Created by PhpStorm.
 * User: mr.mikky
 * Date: 11/5/15
 * Time: 10:19 AM
 */

namespace App\Payment;


use App\Contracts\Paying\Bill;

class PaymentHistory implements \App\Contracts\Paying\PaymentHistory
{
    /**
     * @param Bill $bill
     * @return \App\Contracts\Paying\PaymentHistory
     */
    public function log(Bill $bill)
    {
        // TODO: Implement log() method.
    }
}