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

    protected $billFactory;

    protected $billItemFactory;

    /**
     * @param Connection $connection
     * @param BillReader $billReader
     * @param BillFactory $billFactory
     * @param BillItemFactory $billItemFactory
     */
    public function __construct(Connection $connection
                            , BillReader $billReader
                            , BillFactory $billFactory)
    {
        $this->connection       = $connection;
        $this->billReader       = $billReader;
        $this->billFactory      = $billFactory;
    }

    /**
     * @param Bill $bill
     * @throws SaveBillException
     * @throws \Exception
     */
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

    public function getBillsByMember($memberId)
    {
        $rawData = $this->connection->query()->from('bills')
                                            ->where('memberId','=',$memberId)
                                            ->get();

        return $this->billFactory->buildAll($rawData);
    }
}