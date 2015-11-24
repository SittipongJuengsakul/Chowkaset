<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_plans', function (Blueprint $table) {
            $table->increments('cp_id');
            $table->string('cp_name',100);
            $table->string('cp_owner',100);
            $table->string('cp_duration',10);
            $table->integer('cp_seed_id');
            $table->integer('cp_breed_id');
            $table->text('cp_detail');
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
        Schema::drop('crop_plans');
    }
}
