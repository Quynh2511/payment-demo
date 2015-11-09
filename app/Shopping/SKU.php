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
     * @varbill_items
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
        return floatval($this->originPrice);
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
        $priceAspects = [];

        foreach ($this->appliedPriceAspects as $aspect)
        {
            $aspectSerializedData = [
                'name'  => $aspect->name(),
                'type'  => $aspect->type(),
                'value' => $aspect->value()
            ];

            array_push($priceAspects, $aspectSerializedData);
        }

        return [
            'id'           => $this->id(),
            'name'         => $this->name(),
            'pricing'      => [
                'price'        => $this->price(),
                'origin-price' => $this->originPrice(),
                'aspects'      => $priceAspects
            ]
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