<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/5/15
 * Time: 9:51 AM
 */

namespace App\Payment;


use App\Contracts\Paying\BillItem;
use App\Contracts\Paying\Bill as BillInterface;

class Bill implements BillInterface
{

    /**
     * @var BillItem[]
     */
    protected $billItem = [];

    protected $price;

    /**
     * @param BillItem $billItem
     * @return self
     */
    public function setBillItem(BillItem $billItem)
    {
        array_push($this->billItem, $billItem);
    }

    /**
     * @return float
     */
    public function price()
    {
        foreach ($this->billItem as $bill)
        {
            $this->price += $bill->totalAmount();
        }

        return $this->price;
    }
}