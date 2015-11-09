<?php

namespace App\Payment;

use App\Member\Member;

class BillFactory
{
    /**
     * @var Member
     */
    protected $member;

    /**
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function buildOne($rawData)
    {
        if( ! count($rawData)) return null;

        $row  = $rawData[0];
        $bill = new Bill();
        $bill->setId($row->id);
    }

    /**
     * @param $rawData
     */
    public function buildAll($rawData)
    {
        $bills = [];
        $bill = new Bill();

        foreach($rawData as $rawBill)
        {
            $bill->setId($rawBill->id);

            array_push($bills, $bill);
        }
        return;
    }
}