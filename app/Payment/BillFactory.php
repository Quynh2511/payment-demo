<?php

namespace App\Payment;

class BillFactory
{
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
        return;
    }
}