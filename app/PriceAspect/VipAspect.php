<?php
/**
 * Created by PhpStorm.
 * User: tienvm
 * Date: 11/5/15
 * Time: 10:05 AM
 */

namespace App\PriceAspect;


use App\Contracts\PriceCaculation\PriceAspect;
use App\Contracts\PriceCaculation\PriceAspectType;

/**
 * Class VipAspect
 * @package App\PriceAspect
 */
class VipAspect implements PriceAspect
{
    /**
     * @var
     */
    protected $ratio;

    /**
     * @param $ratio
     */
    public function __construct($ratio)
    {
        $this->ratio = $ratio;
    }
    /**
     * @param float $price
     * @return float
     */
    public function alter($price)
    {
        return $price * (1 - $this->ratio);
    }

    /**
     * @return string
     */
    public function name()
    {
        return 'Member Discount';
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->ratio;
    }

    /**
     * @return string
     */
    public function type()
    {
        return PriceAspectType::TYPE_VIP_MEMBER;
    }
}