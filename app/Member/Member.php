<?php

namespace App\Member;

use App\Contracts\Member\Member as MemberInterface;

class Member implements MemberInterface
{
    /**
     * @var int
     */
    protected $id;

     /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}