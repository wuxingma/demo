<?php

use Illuminate\Database\Seeder;

class IntegralAmountRecoedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(\App\Models\IntegralAmountRecoed::class, 100)->create();
    }
}
