<?php

namespace App\Contracts\PriceCaculation;

/**
 * Interface PriceAspectType
 * @package App\Contracts\PriceCaculation
 */
interface PriceAspectType
{
    /**
     *
     */
    const TYPE_PROMOTE = 'TYPE_PROMOTE';
    /**
     *
     */
    const TYPE_TAX     = 'TYPE_TAX';
    /**
     *
     */
    const TYPE_VIP_MEMBER = 'TYPE_VIP_MEMBER';

    const TYPE_MEMBER = 'TYPE_MEMBER';
}