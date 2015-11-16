<?php

use Illuminate\Database\Seeder;

class TypeContacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typecontacts')->insert([
            'tyct_id' => '1',
            'tyct_name' => 'เบอร์โทรศัพท์',
        ]);
        DB::table('typecontacts')->insert([
            'tyct_id' => '2',
            'tyct_name' => 'อีเมล์',
        ]);
        DB::table('typecontacts')->insert([
            'tyct_id' => '3',
            'tyct_name' => 'เฟสบุ้ก',
        ]);
    }
}
