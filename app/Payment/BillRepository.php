<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/5/15
 * Time: 4:42 PM
 */

namespace App\Payment;


class BillRepository
{
    protected $connection;

    protected $factory;

    public function __construct(Connection $connection, BillFactory $factory)
    {
        $this->connection = $connection;
        $this->factory    = $factory;
    }

    public function insert(Bill $bill)
    {
        DB::table('bills')->insert(
            $bill->toArray()
        );
    }
}