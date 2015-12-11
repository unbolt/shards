<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatsToJobsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Add base stats to the jobs table
            $table->integer('agility');
            $table->integer('dexterity');
            $table->integer('strength');
            $table->integer('intelligence');
            $table->integer('mind');
            $table->integer('charisma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Remove stats from jobs table
            $table->dropColumn('agility');
            $table->dropColumn('dexterity');
            $table->dropColumn('strength');
            $table->dropColumn('intelligence');
            $table->dropColumn('mind');
            $table->dropColumn('charisma');
        });
    }
}
