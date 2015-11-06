<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/5/15
 * Time: 4:43 PM
 */

namespace App\Payment;


class BillReader
{
    /**
     * @param Bill $bill
     * @return array
     */
    public function readBillData(Bill $bill)
    {
        $rawBillData = [
            'totalAmount' => $bill->price(),
            'memberId'    => $bill->member()->id()
        ];

        return $rawBillData;
    }

    /**
     * @param BillItem[] $billItem
     * @param int $id
     *
     * @return array []
     */
    public function readBillItem($billItem, $id)
    {
        $rawBillItemsData = [];

        foreach ($billItem as $item)
        {
            $itemArray = [
                'quantity'     => $item->totalAmount(),
                'billId'       => $id,
                'totalAmount'  => $item->totalAmount(),
                'productId'    => $item->sku()->id()
            ];
            array_push($rawBillItemsData, $itemArray);
        }

        return $rawBillItemsData;
    }
}