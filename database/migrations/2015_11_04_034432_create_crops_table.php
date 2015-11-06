<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            //รหัสตารางการเพาะปลูก
            $table->increments('crop_id');
            //จำนวนผลผลิตต่อไร่
            $table->double('crop_latitude');
            //จำนวนผลผลิตต่อไร่
            $table->double('crop_longitude');
            //จำนวนผลผลิตต่อไร่
            $table->double('crop_product');
            //จำนวนไร่ที่ปลูก
            $table->integer('crop_rai');
            //จำนวนไร่ที่ปลูก
            $table->integer('crop_ngarn');
            //จำนวนไร่ที่ปลูก
            $table->integer('crop_wah');
            //พันธุ้ที่ปลูก
            $table->integer('crop_breed_id');
            //วันที่ประกาศเริ่มต้นเพาะปลูก
            $table->date('crop_start_date');
            //วันที่มีการ input ข้อมูล หรือ ถึงเวลาปลูก
            $table->date('crop_begin_date');
            //วันที่เก็บเกี่ยว หรือ บอกว่าจะเก็บเกี่ยววันนี้
            $table->date('crop_crop_date');
            //วันที่จบการเพาะกปลูกแปลงนี้
            $table->date('crop_end_date');
            //สถานะการเพาะปลูก 0 = วันที่เริ่มไช้งาน , 1=เริ่มเพาะปลูก ,2=กำหนดวันเก็บเกี่ยว ,3=กำหนดวันจบแปลง , 99 = เพาะปลูกล้มเหลง
            $table->integer('crop_status');
            //เวลาสร้าง และ แก้ใข
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
        Schema::drop('crops');
    }
}
