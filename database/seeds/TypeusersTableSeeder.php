<?php

use Illuminate\Database\Seeder;

class TypeusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeusers')->insert([
            'tu_id' => '1',
            'tu_name' => 'แอดมิน',
            'created_at' => 'CURRENT_TIMESTAMP'
        ]);
        DB::table('typeusers')->insert([
            'tu_id' => '2',
            'tu_name' => 'เจ้าหน้าที่',
            'created_at' => 'CURRENT_TIMESTAMP'
        ]);
        DB::table('typeusers')->insert([
            'tu_id' => '3',
            'tu_name' => 'เกษตรกร',
            'created_at' => 'CURRENT_TIMESTAMP'
        ]);
        DB::table('typeusers')->insert([
            'tu_id' => '4',
            'tu_name' => 'ผู้ใช้ทั่วไป',
            'created_at' => 'CURRENT_TIMESTAMP'
        ]);
    }
}
