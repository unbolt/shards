<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullStatsArmour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('armour', function (Blueprint $table) {
            // Allow stats to be null
            $table->integer('agility')->nullable()->change();
            $table->integer('dexterity')->nullable()->change();
            $table->integer('strength')->nullable()->change();
            $table->integer('mind')->nullable()->change();
            $table->integer('intelligence')->nullable()->change();
            $table->integer('charisma')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('armour', function (Blueprint $table) {
            //
        });
    }
}
