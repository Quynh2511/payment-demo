<?php

namespace App\Shopping;

/**
 * Class SKUFactory
 * @package App\Shopping
 */
class SKUFactory
{
    /**
     * @var PriceAspectDecorator
     */
    protected $priceAspectDecorator;

    /**
     * @param PriceAspectDecorator $priceAspectDecorator
     */
    public function __construct(PriceAspectDecorator $priceAspectDecorator)
    {
        $this->priceAspectDecorator = $priceAspectDecorator;
    }

    /**
     * @param $rawData
     * @return SKU|null
     */
    public function buildOne($rawData)
    {
        if ( ! count($rawData)) return null;

        $row = $rawData[0];
        $sku = new SKU();

        $this->setSKUAttributes($sku, $row);
        $this->setPriceAspect($sku);

        return $sku;
    }

    /**
     * @param $rawData
     * @return SKUList
     */
    public function buildMany($rawData)
    {
        $skuList = new SKUList();

        foreach($rawData as $row){
            $sku = new SKU();
            $this->setSKUAttributes($sku, $row);
            $this->setPriceAspect($sku);

            $skuList->push($sku);
        }

        return $skuList;
    }

    /**
     * @param SKU $sku
     */
    protected function setPriceAspect(SKU $sku)
    {
        $this->priceAspectDecorator->decorate($sku);
    }

    /**
     * @param SKU $sku
     * @param $row
     */
    protected function setSKUAttributes(SKU $sku, $row)
    {
        $sku->setId(intval($row->id))
            ->setName($row->name)
            ->setOriginPrice(floatval($row->price))
        ;
    }
}