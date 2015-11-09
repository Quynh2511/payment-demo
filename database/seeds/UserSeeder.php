<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('users')->insert([
                'name'  => 'Tienvm' . $i,
                'email' => 'minhtien2705'.$i.'@gmail.com',
            ]);
        }
    }
}
