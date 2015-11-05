<?php

namespace App\Shopping;

use Illuminate\Database\Connection;

class SKURepository
{
    protected $connection;

    protected $factory;

    public function __construct(Connection $connection, SKUFactory $factory)
    {
        $this->connection = $connection;
        $this->factory    = $factory;
    }

    /**
     * @param $id
     * @return SKU|null
     */
    public function find($id)
    {
        $raw = $this->connection->query()->where('id', '=', $id)->from('products')->get();

        return $this->factory->buildOne($raw);
    }
}
