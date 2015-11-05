<?php

namespace App\Payment;


class BillItem implements \App\Contracts\Paying\BillItem
{
    /**
     * @var String
     */
    protected $name;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $totalAmount;

    /**
     * @param $name
     * @param $quantity
     * @param $price
     */
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