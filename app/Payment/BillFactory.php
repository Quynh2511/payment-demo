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
        $bill = new Bill();

        foreach($rawData as $rawBill)
        {
            $bill->setId($rawBill->id);

            array_push($billList, $bill);
        }
        return $billList;
    }
}