<?php

use Illuminate\Database\Seeder;

class MonsterTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monster_type')->insert([
            ['name' => 'Humanoid'],
            ['name' => 'Beast'],
            ['name' => 'Demon']
        ]);
    }
}
