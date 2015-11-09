<?php

namespace App\Shopping;

use Illuminate\Support\Collection;

/**
 * Class SKUList
 * @package App\Shopping
 */
class SKUList extends Collection
{
    /**
     * @return array
     */
    public function toArray()
    {
        $rawArrayData = [];

        /** @var SKU $sku */
        foreach ($this as $sku)
        {
            array_push($rawArrayData, $sku->toArray());
        }

        return $rawArrayData;
    }
}