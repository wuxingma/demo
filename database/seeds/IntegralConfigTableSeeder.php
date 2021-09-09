<?php

use Illuminate\Database\Seeder;

class IntegralConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('integral_config')->insert([
            [
                'level' => 1,
                'name' => '上级',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'level' => 2,
                'name' => '上上级',
                'amount' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
