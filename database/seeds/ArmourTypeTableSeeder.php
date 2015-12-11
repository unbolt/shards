<?php

use Illuminate\Database\Seeder;

class ArmourTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed our armour types
        DB::table('armour_type')->insert([
            ['name' => 'Light Armour'],
            ['name' => 'Medium Armour'],
            ['name' => 'Heavy Armour']
        ]);
    }
}
