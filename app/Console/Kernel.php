<?php

namespace App\Console;

use App\Jobs\GetDataHotel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\GetDataFacilities;
use App\Jobs\GetDataRoomTypes;
use App\Jobs\GetDataDestination;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new GetDataFacilities)->everyMinute();
        $schedule->job(new GetDataRoomTypes)->everyMinute();
        $schedule->job(new GetDataDestination)->everyMinute();
        $schedule->job(new GetDataHotel)->everyMinute();

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
