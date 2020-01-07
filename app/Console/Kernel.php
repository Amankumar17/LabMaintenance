<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
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

        //$current_date_time = Carbon::now()->toDateTimeString();

        //$admin = $request->session()->get('admin');

        $c = DB::table('complaints')->where('status',1)->get();
        $ad = DB::table('admin_login')->get(); 
        echo $ad;
        echo $ad->count();
        // $data = array('name'=>"Lab Maintenance",'fname'=>$fname,'lname'=>$lname,'date_of_complaint'=>$date_of_complaint);
        // Mail::send(['text'=>'admin_mail'], $data, function($message) use ($email,$fname,$lname,$date_of_complaint){
           
        //    $message->to($email, 'Lab Maintenance')->subject
        //       ('Lab Maintenance Testing Mail');
        //    $message->from('shrivastavaman171@gmail.com','Lab Maintenance');
        // });
        // echo "Basic Email Sent. Check your inbox.";

        //$date_of_complaint = date('d M Y', strtotime($c[0]->created_at)) ->created_at;
        // if($c[0]->rollno!='NULL'){
        //     $rollno = $c[0]->rollno;
        //     $f = DB::table('stu_record')->where('Roll_no',$rollno)->get();
        //     $email = $f[0]->emailid;
        //     $fname = $f[0]->First_name;
        //     $lname = $f[0]->Last_name;

        // }
        // else{
        //     $sdrn = $c[0]->sdrn;
        //     $f = DB::table('faculty')->where('Sdrn',$sdrn)->get();
        //     $email = $f[0]->Email;
        //     $fname = $f[0]->First_name;
        //     $lname = $f[0]->Last_name;
        // }
        
        // $to= $email;;
        // $subject="testing";
        // $msg="Your issue has been solved sucessfully";
        // $headers="From : laliteshkhan1@gmail.com";
        // if(mail($to,$subject,$msg,$headers))
        // {
        //     echo "Email send Successfully";
        // }
        // else
        // {
        //     echo "Email not sent";
        // }

        
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
