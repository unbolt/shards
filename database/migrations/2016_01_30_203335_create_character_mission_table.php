<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_missions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id');
            $table->integer('mission_id');
            $table->timestamp('start_at');
            $table->timestamp('finish_at');
            $table->boolean('active');
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
        Schema::drop('character_missions');
    }
}
