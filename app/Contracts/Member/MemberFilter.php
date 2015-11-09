<?php
/**
 * Created by PhpStorm.
 * User: tienvm
 * Date: 11/9/15
 * Time: 10:52 AM
 */

namespace App\Contracts\Member;


/**
 * Interface MemberFilter
 * @package App\Contracts\Member
 */
interface MemberFilter
{
    /**
     * @return int
     */
    public function id();

    /**
     * @return int
     */
    public function userId();

    /**
     * @return mixed
     */
    public function memberGroupId();

}