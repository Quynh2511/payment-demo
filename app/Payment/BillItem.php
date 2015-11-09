<?php

namespace App\Payment;

use App\Contracts\Paying\BillItem as BillItemInterface;
use App\Contracts\Shopping\SKU;

/**
 * Class BillItem
 * @package App\Payment
 */
class BillItem implements BillItemInterface
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
}