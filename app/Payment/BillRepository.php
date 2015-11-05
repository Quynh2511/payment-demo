<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/5/15
 * Time: 4:42 PM
 */

namespace App\Payment;


use Illuminate\Database\Connection;

class BillRepository
{
    protected $connection;

    protected $factory;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function insert(Bill $bill)
    {
        $this->connection->table('bills')->insert(
            $bill->toArray()
        );
    }
}