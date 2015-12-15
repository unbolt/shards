<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('quality_id');
            $table->integer('weapon_type_id');
            $table->string('icon');
            $table->integer('level');

            // Attributes
            $table->integer('attack');
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
        Schema::drop('weapons');
    }
}
