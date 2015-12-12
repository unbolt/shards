<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armour', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('quality_id');
            $table->integer('armour_type_id');
            $table->string('icon');
            $table->integer('level');

            // Attributes
            $table->integer('defense');
            $table->integer('agility');
            $table->integer('dexterity');
            $table->integer('strength');
            $table->integer('mind');
            $table->integer('intelligence');
            $table->integer('charisma');

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
        Schema::drop('armour');
    }
}
