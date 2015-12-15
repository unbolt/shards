<?php

use Illuminate\Database\Seeder;

class WeaponTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('weapon_type')->insert([
            ['name' => 'Sword'],
            ['name' => 'Dagger'],
            ['name' => 'Club'],
            ['name' => 'Staff'],
        ]);
    }
}
