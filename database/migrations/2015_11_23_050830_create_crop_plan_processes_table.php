<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropPlanProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_plan_processes', function (Blueprint $table) {
            $table->increments('cpc_id');
            $table->integer('cpc_num');
            $table->integer('cpc_type');
            $table->integer('cpc_start');
            $table->integer('cpc_end');
            $table->string('cpc_detail');
            $table->integer('cpc_notice');
            $table->integer('cpc_status');
            $table->integer('cpc_batch');
            $table->integer('cpc_cp_id');
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
        Schema::drop('crop_plan_processes');
    }
}
