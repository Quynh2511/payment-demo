<?php

namespace App\Payment;

use App\Contracts\Member\Member;
use App\Contracts\Paying\BillItem;
use App\Contracts\Paying\Bill as BillInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class Bill
 * @package App\Payment
 */
class Bill implements BillInterface, Arrayable, Jsonable
{

    /**
     * @var Member
     */
    protected $member;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var BillItem[]
     */
    protected $billItems = [];

    /**
     * @param Member $member
     * @return self
     */
    public function setMember(Member $member)
    {
        $this->member = $member;
        
        return $this;
    }

    /**
     * @param $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param BillItem $billItem
     * @return self
     */
    public function setBillItem(BillItem $billItem)
    {
        array_push($this->billItems, $billItem);
    }

    /**
     * @return float
     */
    public function price()
    {
        $price = 0;
        
        foreach ($this->billItems as $item)
        {
            $price += $item->totalAmount();
        }

        return $price;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $itemsArray = [];

        foreach ($this->billItems as $item)
        {
            $itemArray = [
                'sku' => [
                    'id'             => $item->sku()->id(),
                    'name'           => $item->sku()->name(),
                    'price'          => $item->sku()->price(),
                    'original-price' => $item->sku()->originPrice(),
                ],
                'quantity'     => $item->quantity(),
                'total-amount' => $item->totalAmount()
            ];

            array_push($itemsArray, $itemArray);
        }
        
        return [
            'id'           => $this->id(),
            'total-amount' => $this->price(),
            'items'        => $itemsArray,
            'member-id'    => $this->member()->id()
        ];
    }

    /**
     * @return BillItem[]
     */
    public function all()
    {
        return $this->billItems;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * @return Member
     */
    public function member()
    {
        return $this->member;
    }
}