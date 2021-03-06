<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ArmourTypeTableSeeder');
        $this->call('ArmourSlotTableSeeder');
        $this->call('MonsterTypeTableSeeder');
        $this->call('MonsterRankTableSeeder');
        $this->call('WeaponTypeTableSeeder');

        Model::reguard();
    }
}
