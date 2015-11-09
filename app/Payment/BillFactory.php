<?php

namespace App\Payment;

/**
 * Class BillFactory
 * @package App\Payment
 */
class BillFactory
{
    /**
     * @param $rawData
     * @return Bill[]
     */
    public function buildAll($rawData)
    {
        if( ! count($rawData)) return null;

        $billList = [];

        foreach($rawData as $rawBill)
        {
            $bill = new Bill();
            $bill->setId($rawBill->id);
            $bill->setTotalAmount($rawBill->totalAmount);
            $bill->setPurchaseDate($rawBill->created_at);
            array_push($billList, $bill);
        }
        return $billList;
    }
}