<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typeusers', function (Blueprint $table) {
            //รหัสตาราง ประเภทสมาชิก เช่น เจ้าหน้าที่,เกษตรกร
            $table->increments('tu_id');
            //ชื่อประเภทสมาชิก
            $table->string('tu_name');
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
        Schema::drop('typeusers');
    }
}
