<?php

namespace App\Payment;

use App\Contracts\Paying\Bill;
use Illuminate\Database\Connection;

/**
 * Class PaymentHistory
 * @package App\Payment
 */
class PaymentHistory implements \App\Contracts\Paying\PaymentHistory
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param Bill $bill
     * @return self
     */
    public function log(Bill $bill)
    {
        $this->connection->table('payment_histories')->insert([
            'id'        => $bill->id(),
            'totalCost' => $bill->price(),
            'memberId'  => $bill->member()->id(),
        ]);
    }
}