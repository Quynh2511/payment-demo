<?php

namespace App\Payment;

use App\Contracts\Paying\Bill;
use Illuminate\Database\Connection;
use Mockery\Exception;

/**
 * Class BillRepository
 * @package App\Payment
 */
class BillRepository
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var BillReader
     */
    protected $billReader;

    /**
     * @param Connection $connection
     * @param BillReader $billReader
     */
    public function __construct(Connection $connection, BillReader $billReader)
    {
        $this->connection = $connection;
        $this->billReader = $billReader;
    }

    /**
     * @param Bill $bill
     * @throws SaveBillException
     * @throws \Exception
     */
    public function save(Bill $bill)
    {
        $this->connection->beginTransaction();

        try
        {

            $billId = $this->connection
                            ->table('bills')
                            ->insertGetId($this->billReader->readBillData($bill));

            $this->connection->table('bill_items')
                            ->insert($this->billReader->readBillItem($bill->all(), $billId));

            $this->connection->commit();
        }
        catch (\Exception $exception)
        {

            $this->connection->rollBack();

            throw new SaveBillException("Save bill failure: Caught database exception.", 1, $exception);
        }

    }
}