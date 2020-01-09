<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Mail;

class send_admin_mail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AdminNotification:Evening';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to admin in evening notifying about complaints received on that day.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $c = DB::table('complaints')->where('status',1)->get();
        $ad = DB::table('admin_login')->get(); 
        //echo $ad;
        // echo $ad->count();
        //  echo $c->count();
        //  echo("\n");
        for($i=0;$i<$ad->count();$i++)
        {
        //echo $ad[$i]->floor;
        $email = $ad[$i]->email;
        $fname = $ad[$i]->username;
        $cmp = DB::table('complaints')->where(['status'=>1,'floor'=>$ad[$i]->floor])->get();
        $cnt = $cmp->count();
        //echo ($ad[$i]->floor." ".$cmp->count());
        //echo("\n");
        $data = array('name'=>"Lab Maintenance",'fname'=>$fname,'count'=>$cnt);
        Mail::send(['text'=>'admin_mail'], $data, function($message) use ($email,$fname,$cnt){
    
            $message->to($email, 'Lab Maintenance')->subject('Lab Maintenance Testing Mail');
            $message->from('shrivastavaman171@gmail.com','Lab Maintenance');
        });
        //echo "Basic Email Sent. Check your inbox.";
        }

    }
}
