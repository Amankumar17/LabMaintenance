<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Mail;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\send_admin_mail'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->command('AdminNotification:Evening')->dailyAt('17:53');

        // $schedule -> exec("php artisan AdminNotification:Evening");

        // $schedule->call(function () {
            // $schedule -> exec("php artisan AdminNotification:Evening");
        // })->everyMinute();

        //$current_date_time = Carbon::now()->toDateTimeString();

        //$admin = $request->session()->get('admin');

        
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
