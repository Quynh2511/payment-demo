<?php

namespace App\Payment\Presenters;


use App\Contracts\Paying\BillItem;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class BillItemListJsonPresenter implements Arrayable, Jsonable
{
    /**
     * @var BillItem[]
     */
    protected $billItems;

    /**
     * @param BillItem[] $billItems
     */
    public function __contract($billItems)
    {
        $this->billItems = $billItems;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $rawBillItemList = [];

        foreach($this->billItems as $billItem){

            array_push($rawBillItemList,[
                'total-amount'  => $billItem->totalAmount(),
                'product-id'    => $billItem->sku()->id(),
                'quantity'      => $billItem->quantity(),
            ]);
        }

        return $rawBillItemList;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        json_decode($this->toArray(), $options);
    }
}