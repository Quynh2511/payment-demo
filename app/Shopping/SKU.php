<?php

namespace App\Shopping;

use App\Contracts\Shopping\SKU as SKUInterface;

/**
 * Class SKU
 * @package App\Shopping
 */
class SKU implements SKUInterface
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $originPrice;

    /**
     * @var
     */
    protected $price;

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $originPrice
     */
    public function setOriginPrice($originPrice)
    {
        $this->originPrice = $originPrice;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function originPrice()
    {
        return $this->originPrice;
    }

    /**
     * @return float
     */
    public function price()
    {
        return $this->price;
    }

}