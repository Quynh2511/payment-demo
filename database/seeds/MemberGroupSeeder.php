<?php

use Illuminate\Database\Seeder;

class MemberGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_groups')->insert([
            'name'    => 'normal'
        ]);

        for($i = 0; $i < 3; $i++){
            DB::table('member_groups')->insert([
                'name'    => 'Vip' . $i,
            ]);
        }

    }
}
