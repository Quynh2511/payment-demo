<?php

namespace App\Shopping;

use App\PriceAspect\TaxAspect;
use App\PriceAspect\VipAspect;

class SKUFactory
{
    public function buildOne($rawData)
    {
        if ( ! count($rawData)) return null;

        $row = $rawData[0];

        return with(new SKU())
            ->setId($row->id)
            ->setName($row->name)
            ->setOriginPrice($row->price)
            ->setPriceAspect(new TaxAspect(0.1))
            ->setPriceAspect(new VipAspect(0.3))
        ;
    }

    public function buildMany($rawData)
    {

    }
}