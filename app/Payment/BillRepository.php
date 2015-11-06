<?php

namespace App\Payment;

use App\Contracts\Paying\Bill;
use Illuminate\Database\Connection;
use Mockery\Exception;

class BillRepository
{
    protected $connection;

    protected $billReader;

    public function __construct(Connection $connection, BillReader $billReader)
    {
        $this->connection = $connection;
        $this->billReader = $billReader;
    }

    public function save(Bill $bill)
    {
         \DB::beginTransaction();

        try {

            $billId = $this->connection
                            ->table('bills')
                            ->insertGetId($this->billReader->readBillData($bill));

            $this->connection->table('bill_items')
                            ->insert($this->billReader->readBillItem($bill->all(), $billId));

            \DB::commit();
        }
        catch (SaveBillException $saveBillException) {

            \DB::rollBack();

            throw $saveBillException;
        }

    }
}