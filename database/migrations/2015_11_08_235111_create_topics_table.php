<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('tp_id');
            $table->integer('tp_topics_type_id');
            $table->text('tp_title');
            $table->text('tp_detail');
            $table->integer('tp_status');
            $table->integer('tp_countviews');
            $table->integer('tp_countcomments');
            $table->integer('tp_countvotes');
            $table->integer('tp_user_id');
            $table->integer('tp_crop_id');
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
        Schema::drop('topics');
    }
}
