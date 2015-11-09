<?php

namespace App\Payment;


use App\Shopping\SKU;

/**
 * Class BillItemFactory
 * @package App\Payment
 */
class BillItemFactory
{
    /**
     * @param $rawData
     * @return BillItem[]
     */
    public function makeBillItemList($rawData)
    {
        if( ! count($rawData)) return null;

        $billItemList = [];

        foreach($rawData as $row)
        {
            $sku = new SKU();
            $sku->setId($row->productId);

            $billItem = new BillItem($sku, $row->quantity);
            $billItem->setTotalAmount($row->totalAmount);

            array_push($billItemList, $billItem);
        }
        return $billItemList;
    }
}