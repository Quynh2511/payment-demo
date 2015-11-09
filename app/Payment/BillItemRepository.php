<?php

namespace App\Payment;


use Illuminate\Database\Connection;

/**
 * Class BillItemRepository
 * @package App\Payment
 */
class BillItemRepository
{
    /**
     * BillItemRepository constructor.
     * @param Connection $connection
     * @param BillItemFactory $billItemFactory
     */
    public function __construct(Connection $connection, BillItemFactory $billItemFactory)
    {
        $this->connection       = $connection;
        $this->billItemFactory  = $billItemFactory;
    }

    /**
     * @param $billId
     * @return BillItem[]
     */
    public function getBillItemList($billId)
    {
        $rawData = $this->connection->query()->from('bill_items')
            ->where('billId', '=', $billId)
            ->get();

        return $this->billItemFactory->makeBillItemList($rawData);
    }
}