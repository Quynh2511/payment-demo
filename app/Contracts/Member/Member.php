<?php

namespace App\Contracts\Member;

/**
 * Interface Member
 * @package App\Contracts\Member
 */
interface Member
{
    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function name();

    /**
     * @return string
     */
    public function email();

    /**
     * @return []
     */
    public function memberType();
}