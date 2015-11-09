<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('pf_id');
            $table->integer('user_id');
            $table->integer('prefix');
            $table->string('fname',100);
            $table->string('lname',100);
            $table->string('card_id',13);
            $table->integer('user_province_code');
            $table->integer('user_district_code');
            $table->integer('user_sub_code');
            $table->date('birthday');
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
        Schema::drop('profiles');
    }
}
