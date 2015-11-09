<?php

namespace App\Member;

use App\Contracts\Member\Member as MemberInterface;

/**
 * Class Member
 * @package App\Member
 */
class Member implements MemberInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var
     */
    protected $member_type;

     /**
     * @return int
     */
    public function id()
    {
        return 2;
    }

    /**
     * @return string
     */
    public function name()
    {
        // TODO: Implement name() method.
    }

    /**
     * @return string
     */
    public function email()
    {
        // TODO: Implement email() method.
    }

    /**
     * @return array
     */
    public function memberType()
    {
        return [9];
    }


}