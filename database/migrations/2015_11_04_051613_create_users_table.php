<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //รหัสตารางผู้ใช้งาน
            $table->increments('id');
            //รหัสเข้าไช้งาน
            $table->string('member_id');
            //ประเภทการล็อกอิน เช่น fb,chowkaset,line
            $table->tinyinteger('typemember_id');
            //ประเภทสมาชิก เช่น แอดมิน,เกษตรกร,เจ้าหน้าที่
            $table->tinyinteger('typeuser_id');
            //ชื่อเล่นผู้เข้าไช้งาน
            $table->string('name',100);
            //รหัสผ่าน 
            $table->string('password')->default('null');
            //อีเมล์ผู้ใช้งาน
            $table->string('email',100);
            //รูปภาพผู้ใช้งาน
            $table->string('picture');
            //การเก็บ token
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
