<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\RefundFailedMessages::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        // This is the key: schedule your command every minute
        $schedule->command('messages:refund-failed')->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
