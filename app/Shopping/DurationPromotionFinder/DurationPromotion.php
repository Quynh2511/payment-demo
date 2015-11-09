<?php

namespace App\Shopping\DurationPromotionFinder;

use Carbon\Carbon;

/**
 * Class DurationPromotion
 * @package App\Shopping
 */
class DurationPromotion
{

    /**
     * @var int
     */
    protected $skuId;

    /**
     * @var Carbon
     */
    protected $begin;

    /**
     * @var Carbon
     */
    protected $end;

    /**
     * @var float
     */
    protected $ratio;

    /**
     * @return int
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * @param int $skuId
     * @return self
     */
    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * @param Carbon $begin
     * @return self
     */
    public function setBegin(Carbon $begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Carbon $end
     * @return DurationPromotion
     */
    public function setEnd(Carbon $end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * @return float
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * @param float $ratio
     * @return self
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;

        return $this;
    }

    /**
     * @param float $ratio
     * @param Carbon $begin
     * @param Carbon $end
     * @param int $skuId
     */
    public static function create($ratio, Carbon $begin, Carbon $end, $skuId)
    {
        return with(new static())
            ->setRatio($ratio)
            ->setBegin($begin)
            ->setEnd($end)
            ->setSkuId($skuId)
        ;
    }
}