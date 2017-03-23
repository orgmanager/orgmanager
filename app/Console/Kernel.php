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
        \App\Console\Commands\AddToken::class,
        \App\Console\Commands\UpdateOrg::class,
        \App\Console\Commands\JoinOrg::class,
        \App\Console\Commands\EncryptOrgPasswords::class,
        \App\Console\Commands\RemindUsers::class,
        \Bugsnag\BugsnagLaravel\Commands\DeployCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('orgmanager:remind-users', ['--force'])
                    ->weekly()
                    ->evenInMaintenanceMode();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
