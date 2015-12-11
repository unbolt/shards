<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            // Bonus stats fields
            $table->integer('agility');
            $table->integer('dexterity');
            $table->integer('strength');
            $table->integer('intelligence');
            $table->integer('mind');
            $table->integer('charisma');
            // Sure timestamps why not
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
        Schema::drop('races');
    }
}
