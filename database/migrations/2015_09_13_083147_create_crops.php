<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->increments('crop_id');
            $table->date('start_date');
            $table->date('crop_date');
            $table->float('rai');
            $table->float('ngarn');
            $table->float('wah');
            $table->tinyinteger('irrigation');
            $table->integer('seed_id');
            $table->integer('crop_user_id');
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
