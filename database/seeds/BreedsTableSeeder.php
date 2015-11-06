<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breeds')->insert([
            'breed_id' => null,
            'breed_name' => 'ข้าว กข. 47',
            'seed_id' => '1'
        ]);
        DB::table('breeds')->insert([
            'breed_id' => null,
            'breed_name' => 'ข้าว กข. 29',
            'seed_id' => '1'
        ]);
        DB::table('breeds')->insert([
            'breed_id' => null,
            'breed_name' => 'ข้าวลืมผัว',
            'seed_id' => '1'
        ]);
    }
}
