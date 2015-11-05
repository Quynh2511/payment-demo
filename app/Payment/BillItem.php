<?php

namespace App\Payment;


class BillItem implements \App\Contracts\Paying\BillItem
{
    protected $name;

    protected $quantity;

    protected $price;

    protected $totalAmount;

    public function __construct($name, $quantity, $price)
    {
        $this->name     = $name;
        $this->quantity = $quantity;
        $this->price    = $price;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function quantity()
    {
       return $this->quantity;
    }

    /**
     * @return float
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function totalAmount()
    {
        $this->totalAmount = $this->price * $this->quantity;
        return $this->totalAmount;
    }
}