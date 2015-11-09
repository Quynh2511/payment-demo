<?php

namespace App\Payment;


use App\Contracts\Paying\BillItem as BillItemInterface;
use App\Contracts\Shopping\SKU;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class BillItem
 * @package App\Payment
 */
class BillItem implements BillItemInterface, Arrayable, Jsonable
{
    /**
     * @var SKU
     */
    protected $sku;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $totalAmount;

    /**
     * @param SKU $sku
     * @param $quantity
     */
    public function __construct(SKU $sku, $quantity)
    {
        $this->sku      = $sku;
        $this->quantity = $quantity;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'skuId'        => $this->sku()->id(),
            'quantity'     => $this->quantity(),
            'total-amount' => $this->totalAmount()
        ];
    }

    /**
     * @return SKU
     */
    public function sku()
    {
        return $this->sku;
    }

    /**
     * @return int
     */
    public function quantity()
    {
        return $this->quantity;
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
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @return float
     */
    public function totalAmount()
    {
        return $this->quantity() * $this->sku()->price();
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

}