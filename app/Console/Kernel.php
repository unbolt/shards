<?php

namespace Shards\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Shards\Console\Commands\Inspire::class,
        \Shards\Console\Commands\ChatServer::class,
        \Shards\Console\Commands\AddEnergy::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('character:addEnergy')->everyFiveMinutes()->sendOutputTo("/www/sites/shards/storage/logs/addenergy.log");
    }
}
