<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropPlanTimegrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_plan_timegrows', function (Blueprint $table) {
            $table->increments('cpt_id');
            $table->integer('cpt_num');
            $table->integer('cpt_duration');
            $table->string('cpt_detail');
            $table->integer('cpt_status');
            $table->integer('cpt_batch');
            $table->integer('cpt_cp_id');
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
        Schema::drop('crop_plan_timegrows');
    }
}
