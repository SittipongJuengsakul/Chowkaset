<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_accounts', function (Blueprint $table) {
            $table->increments('acc_id');
            $table->string('acc_detail');
            $table->date('acc_date');
            $table->double('acc_price');
            $table->tinyinteger('acc_cost_type');
            $table->integer('acc_crop_id');
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
        Schema::drop('crop_accounts');
    }
}
