<?php

namespace Shards\Console\Commands;

use Shards\Character;
use Illuminate\Console\Command;

class AddEnergy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'characters:addEnergy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds one energy to all characters, up to a maximum of 100';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*
            Go through all users and add an energy to them, up to the cap of 100

        */

        $characters = Character::all();

        $bar = $this->output->createProgressBar(count($characters));

        foreach($characters as $character) {

            if($character->energy < 100) {
                $character->energy++;

                $character->save();
            }

            $bar->advance();
        }

        $bar->finish();
    }
}
