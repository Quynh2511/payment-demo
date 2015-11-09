<?php
/**
 * Created by PhpStorm.
 * User: tienvm
 * Date: 11/9/15
 * Time: 11:17 AM
 */

namespace App\Shopping\MemberSpecification;


use App\Member\Member;
use Illuminate\Database\Connection;

class MemberSpecification
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
    public function memberType(Member $member)
    {
        $userId = $member->id();
        return $this->connection->query()->where('user_id', '=', $userId)->from('member_filters')->get();
    }
}