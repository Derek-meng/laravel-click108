<?php

namespace Jubilee\Click108\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Jubilee\Click108\Console\Commands\DetectorConstellations;

class Kernel extends ConsoleKernel
{
    /**
     * @param Schedule $schedule
     */
    public function schedule(Schedule $schedule)
    {
        $schedule->command(DetectorConstellations::class)->daily();
    }
}
