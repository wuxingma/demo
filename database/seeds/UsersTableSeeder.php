<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'parent_id' => 0,
            'integral_amount' => rand(100, 999),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        factory(\App\Models\Users::class, 99)->create();
    }
}
