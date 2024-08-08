<?php

namespace App\Console;

use App\Console\Commands\DeleteExpiredOtp;
use App\Jobs\UpdateSubServiceAvailabilityJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\Sitemap\SitemapGenerator;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function Schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new UpdateSubServiceAvailabilityJob)->everyMinute();
        $schedule->command('otp:cleanup')->everyMinute();
        $schedule->call(function () {
            SitemapGenerator::create('https://mnazel.net/')->writeToFile(public_path('sitemap.xml'));
        })->weekly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


}
