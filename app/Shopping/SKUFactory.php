<?php

namespace App\Shopping;

class SKUFactory
{
    protected $priceAspectDecorator;

    public function __construct(PriceAspectDecorator $priceAspectDecorator)
    {
        $this->priceAspectDecorator = $priceAspectDecorator;
    }

    public function buildOne($rawData)
    {
        if ( ! count($rawData)) return null;

        $row = $rawData[0];
        $sku = new SKU();

        $this->setSKUAttributes($sku, $row);
        $this->setPriceAspect($sku);

        return $sku;
    }

    public function buildMany($rawData)
    {

    }

    protected function setPriceAspect(SKU $sku)
    {
        $this->priceAspectDecorator->decorate($sku);
    }

    protected function setSKUAttributes(SKU $sku, $row)
    {
        $sku->setId($row->id)
            ->setName($row->name)
            ->setOriginPrice($row->price)
        ;
    }
}