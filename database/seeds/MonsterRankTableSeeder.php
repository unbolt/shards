<?php

use Illuminate\Database\Seeder;

class MonsterRankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monster_rank')->insert([
            ['name' => 'Minion'],
            ['name' => 'Skirmisher'],
            ['name' => 'Solider'],
            ['name' => 'Warrior'],
            ['name' => 'Chief'],
            ['name' => 'Overlord'],
            ['name' => 'Boss']
        ]);
    }
}
