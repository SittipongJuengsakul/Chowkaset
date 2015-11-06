<?php

use Illuminate\Database\Seeder;

class TypesmemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typemembers')->insert([
            'tpm_id' => '1',
            'tpm_name' => 'ระบบ chowkaset',
            'created_at' => 'CURRENT_TIMESTAMP'
        ]);
        DB::table('typemembers')->insert([
            'tpm_id' => '2',
            'tpm_name' => 'เฟสบุ้ก',
            'created_at' => 'CURRENT_TIMESTAMP'
        ]);
    }
}
