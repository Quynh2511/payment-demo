<?php

namespace App\Contracts\Paying;

use App\Contracts\Member\Member;

/**
 * Interface Bill
 * @package App\Contracts\Paying
 */
interface Bill
{
    /**
     * @return int
     */
    public function id();

    /**
     * @return Member
     */
    public function member();

    /**
     * @param BillItem $billItem
     * @return self
     */
    public function setBillItem(BillItem $billItem);

    /**
     * @return BillItem[]
     */
    public function all();

    /**
     * @return float
     */
    public function price();
}