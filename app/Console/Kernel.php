<?php

namespace App\Console;

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
        \App\Console\Commands\FixMangaImages::class, // 👈 qui registri il comando
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Qui potresti aggiungere comandi pianificati se vuoi
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
