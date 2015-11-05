<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++)
        {
            DB::table('products')->insert([
                'name'  => 'Sony Bravia ' . $i,
                'price' => 70,
            ]);
        }
    }
}
