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
            $table->increments('id');
            $table->string('fname', 60);
            $table->string('lname', 60);
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->date('birthday');
            $table->string('card_id', 13);
            $table->text('address');
            $table->integer('user_province_code');
            $table->integer('user_district_code');
            $table->integer('user_sub_code');
            $table->string('picture');
            $table->tinyinteger('active');
            $table->integer('user_type_id');
            $table->integer('user_dept_id');
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
