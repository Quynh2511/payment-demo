<?php

use Illuminate\Database\Seeder;

class MemberFilter extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('member_filters')->insert([
                'user_id'         => $i,
                'member_group_id' => $i,
            ]);
        }

    }
}
