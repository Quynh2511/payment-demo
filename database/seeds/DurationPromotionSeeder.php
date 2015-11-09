<?php

use Illuminate\Database\Seeder;

class DurationPromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++)
        {
            DB::table('duration_promotion')->insert([
                'product_id'  => $i,
                'percentage'  => 0.5,
                'begin'       => '2015-11-04 00:00:01',
                'end'         => '2015-11-10 00:00:01',
            ]);
        }
    }
}
