<?php

namespace App\Shopping;

use App\Contracts\PriceCaculation\PriceAspect;
use App\Contracts\Shopping\SKU as SKUInterface;
use App\Contracts\PriceCaculation\PriceAware;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class SKU
 * @package App\Shopping
 */
class SKU implements SKUInterface, Jsonable, Arrayable, PriceAware
{
    /**
     * @var PriceAspect[]
     */
    protected $appliedPriceAspects = [];

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
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $originPrice
     * @return self
     */
    public function setOriginPrice($originPrice)
    {
        $this->originPrice = $originPrice;

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
        $calculatedPrice = $this->originPrice();

        foreach ($this->appliedPriceAspects as $priceAspect)
        {
            $calculatedPrice = $priceAspect->alter($calculatedPrice);
        }

        return $calculatedPrice;
    }

    public function toArray()
    {
        return [
            'id'           => $this->id(),
            'name'         => $this->name(),
            'price'        => $this->price(),
            'origin-price' => $this->originPrice()
        ];
    }


    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    public function setPriceAspect(PriceAspect $priceAspect)
    {
        array_push($this->appliedPriceAspects, $priceAspect);

        return $this;
    }


}