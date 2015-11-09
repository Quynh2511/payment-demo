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
class Bill implements BillInterface
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
     * @var float
     */
    protected $totalAmount;
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
     * @return float
     */
    public function totalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param float $amount
     * @return self
     */
    public function setTotalAmount($amount)
    {
        $this->totalAmount = $amount;

        return $this;
    }

    /**
     * @return BillItem[]
     */
    public function all()
    {
        return $this->billItems;
    }

    /**
     * @return Member
     */
    public function member()
    {
        return $this->member;
    }
}