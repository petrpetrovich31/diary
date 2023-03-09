<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\BirthdaysCommand;
use App\Console\Commands\DiaryCommand;
use App\Console\Commands\OviScoresCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        BirthdaysCommand::class,
        DiaryCommand::class,
        OviScoresCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('ovi:scores')
            ->dailyAt('09:00');
        $schedule->command('birthdays:send')
            ->dailyAt('10:00');
        $schedule->command('diary:send')
            ->dailyAt('10:30');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
