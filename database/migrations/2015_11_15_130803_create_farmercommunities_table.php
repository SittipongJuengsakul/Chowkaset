<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmercommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmercommunities', function (Blueprint $table) {
            $table->increments('fmcm_id');
            $table->string('fmcm_name');
            $table->integer('province_id');
            $table->integer('aumphur_id');
            $table->integer('district_id');
            $table->integer('dpm_id');
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
        Schema::drop('farmercommunities');
    }
}
