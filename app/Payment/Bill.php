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
use Illuminate\Contracts\Support\Arrayable;

class Bill implements BillInterface, Arrayable
{

    protected $id;

    /**
     * @var BillItem[]
     */
    protected $billItem = [];

    protected $price;

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

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id'           => $this->id(),
            'totalAmount'        => $this->price(),
        ];
    }
}