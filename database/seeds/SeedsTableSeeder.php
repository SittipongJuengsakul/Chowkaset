<?php

use Illuminate\Database\Seeder;

class SeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seeds')->insert([
            'seed_id' => null,
            'seed_name' => 'ข้าว',
        ]);
        DB::table('seeds')->insert([
            'seed_id' => null,
            'seed_name' => 'อ้อย',
        ]);
    }
}
