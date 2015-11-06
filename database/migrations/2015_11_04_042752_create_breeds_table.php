<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            //รหัสชื่อพันธุ์พืช
            $table->increments('breed_id');
            //ชื่อพันธุ์พืช
            $table->string('breed_name',100);
            //คีย์นอก ชนิดพืช
            $table->integer('seed_id');
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
        Schema::drop('breeds');
    }
}
