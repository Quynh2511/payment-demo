<?php

namespace App\Shopping;

use App\Contracts\PriceCaculation\PriceAspect;
use App\PriceAspect\NormalMember;
use App\PriceAspect\VipAspect;

/**
 * Class PriceAspectFromMemberFactory
 * @package App\Shopping
 */
class PriceAspectFromMemberFactory
{
    /**
     * @param $memberType
     * @return PriceAspect
     */
    public function makePriceAspect($memberType)
    {
        if($memberType == 1)
        {
            return new VipAspect(0.3);
        }
        elseif($memberType == 2)
        {
            return new VipAspect(0.2);
        }
        else
        {
            return new NormalMember();
        }
    }
}