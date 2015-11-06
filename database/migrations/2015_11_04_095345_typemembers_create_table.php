<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypemembersCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typemembers', function (Blueprint $table) {
            //รหัสตารางประเภทการล็อกอิน fb,chowkaset
            $table->increments('tpm_id');
            //ชื่อประเภทการล็อกอิน
            $table->string('tpm_name',60);
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
        Schema::drop('typemembers');
    }
}
