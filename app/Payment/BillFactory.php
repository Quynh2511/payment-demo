<?php

namespace App\Payment;

use App\Member\Member;

/**
 * Class BillFactory
 * @package App\Payment
 */
class BillFactory
{
    /**
     * @var Member
     */
    protected $member;

    /**
     * @param $rawData
     * @return Bill
     */
    public function buildOne($rawData)
    {
        if( ! count($rawData)) return null;

        $row  = $rawData[0];
        $bill = new Bill();
        $bill->setId($row->id);
        $bill->setTotalAmount($row->totalAmount);

        return $bill;
    }

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

            array_push($billList, $bill);
        }
        return $billList;
    }
}