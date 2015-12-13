<?php

use Illuminate\Database\Seeder;

class ArmourSlotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed our armour slots
        DB::table('armour_slot')->insert([
            ['name' => 'Shield'],
            ['name' => 'Head'],
            ['name' => 'Body'],
            ['name' => 'Hands'],
            ['name' => 'Legs'],
            ['name' => 'Feet'],
            ['name' => 'Neck'],
            ['name' => 'Finger'],
        ]);
    }
}
