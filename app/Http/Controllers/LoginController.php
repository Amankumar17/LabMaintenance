<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use Mail;
use Carbon\Carbon;

class LoginController extends BaseController
{

    public function feedback(Request $request)
    {
        // $rollno=$request->input('rollno');
        // $pass=$request->input('pass');

        if($request->input('rollno') != "")
        {
            // echo "Init login";
            $rollno=$request->input('rollno');
            $pass=$request->input('pass');
        }
        else{
            // echo "Session login";
            $rollno = $request->session()->get('rollno');
            $pass = $request->session()->get('pass');
        }

        
        $check=DB::table('student_logins')->where(['rollno'=>$rollno,'pass'=>$pass])->get();        

        if(count($check)>0)
        {
            $request->session()->put('rollno', $rollno);
            $request->session()->put('pass', $pass);

            $stud_details=DB::table('stu_record')->where(['Roll_no'=>$rollno])->get();

            $table1=DB::table('floor_lab')->get();
            $table2=DB::table('systems')->get();

            $uniqueFloor = DB::table('floor_lab')
            ->select('floor')
            ->groupBy('floor')
            ->get();

            $uniqueLab = DB::table('systems')
            ->select('labno')
            ->groupBy('labno')
            ->get();

            $common_issues = DB::table('common_issues')->get();

            $table2 = $table2->sort();
            // echo $table2;
            // $uniqueFloor = $uniqueFloor->sort();

            $complaint=DB::table('complaints')->get();

            return view('feedback')->with('floor_lab',$table1)->with('systems',$table2)->with('common_issues',$common_issues)->with('floors',$uniqueFloor)->with('lab',$uniqueLab)->with('stud_details',$stud_details)->with('complaint',$complaint);
        }   
        else {
            return view('student_login');   
        }
    }

    public function student_history(Request $request)
    {
        $rollno = $request->session()->get('rollno');

        $stud_details=DB::table('stu_record')->where(['Roll_no'=>$rollno])->get();        

        $complaint=DB::table('complaints')->where(['rollno'=>$rollno])->get();
            
        return view('student_history')->with('complaint',$complaint)->with('stud_details',$stud_details);
            
    }

    public function teacher(Request $request)
    {
        // $sdrn=$request->input('sdrn');
        // $pass1=$request->input('pass1');
        
        if($request->input('sdrn') != ""){
            // echo "Init login";
            $sdrn=$request->input('sdrn');
            $pass1=$request->input('pass1');
        }
        else{
            // echo "Session login";
            $sdrn = $request->session()->get('sdrn');
            $pass1 = $request->session()->get('pass1');
        }

        $check=DB::table('faculty_logins')->where(['sdrn'=>$sdrn,'pass'=>$pass1])->get();
        // echo $request->session()->get('user');

        if(count($check)>0)    
        {
            $request->session()->put('sdrn', $sdrn);
            $request->session()->put('pass1', $pass1);


            $fac_details=DB::table('faculty')->where(['sdrn'=>$sdrn])->get();
            $complaint=DB::table('complaints')->where(['sdrn'=>$sdrn])->get();
            
            return view('teacher')->with('complaint',$complaint)->with('fac_details',$fac_details);
        }
        else {
            return view('student_login');
        } 
    }

    public function teacher_feedback(Request $request)
    {
        $sdrn = $request->session()->get('sdrn');    
        
        $table1=DB::table('floor_lab')->get();
        $table2=DB::table('systems')->get();

        $uniqueFloor = DB::table('floor_lab')
        ->select('floor')
        ->groupBy('floor')
        ->get();

        $uniqueLab = DB::table('systems')
        ->select('labno')
        ->groupBy('labno')
        ->get();

        $table2 = $table2->sort();

        $complaint=DB::table('complaints')->get();

        return view('teacher_feedback')->with('sdrn',$sdrn)->with('floor_lab',$table1)->with('systems',$table2)->with('floors',$uniqueFloor)->with('lab',$uniqueLab)->with('complaint',$complaint);
    }

    public function status_teacher_confirm(Request $request){

        $comp_no = $request->input('comp_no');

        $justification=$request->input('justification');

        $current_date_time = Carbon::now()->toDateTimeString();

        $sdrn = $request->session()->get('sdrn');

        if (isset($_POST['Confirm'])) {
            
            DB::table('complaints')->where('comp_no',$comp_no)->update(
                ['status'=>1, 'updated_at'=>$current_date_time]);

            $fc = DB::table('complaints')->where('comp_no',$comp_no)->get();    
                
            $cc = DB::table('complaints_frequency')->where(['labno'=>$fc[0]->labno,'sysno'=>$fc[0]->sysno,'problem'=>$fc[0]->problem])->get();

            if ($cc->count() > 0)
            {
                DB::table('complaints_frequency')->where('srno',$cc[0]->srno)->update(
                    ['frequency'=>($cc[0]->frequency)+1 ,'comp_nos'=>($cc[0]->comp_nos).','.(string)$fc[0]->comp_no]
                );
            }
            else
            {
                DB::table('complaints_frequency')->insert(
                    ['srno'=>$fc[0]->comp_no,'floor'=>$fc[0]->floor,'labno'=>$fc[0]->labno,'sysno'=>$fc[0]->sysno,'problem'=>$fc[0]->problem,'status'=>$fc[0]->status,'date'=>$fc[0]->created_at,'frequency'=>1 ,'comp_nos' =>(string)$fc[0]->comp_no]
                );
            
            }
                
        } else if (isset($_POST['Reject'])) {

            $c = DB::table('complaints')->where('comp_no',$comp_no)->get();

            $labno = $c[0]->labno;
            $sysno = $c[0]->sysno;
            $problem = $c[0]->problem;
            $date_of_complaint = date('d M Y', strtotime($c[0]->created_at));

            $rollno = $c[0]->rollno;
            $f = DB::table('stu_record')->where('Roll_no',$rollno)->get();
            $email = $f[0]->emailid;
            $fname = $f[0]->First_name;
            $lname = $f[0]->Last_name;

            $sdrn = $c[0]->sdrn;
            $f = DB::table('faculty')->where('Sdrn',$sdrn)->get();
            $teacher_f = $f[0]->First_name;
            $teacher_l = $f[0]->Last_name;

            $data = array('name'=>"Lab Maintenance",'fname'=>$fname,'lname'=>$lname,'date_of_complaint'=>$date_of_complaint, 'justification'=>$justification, 'teacher_f'=>$teacher_f, 'teacher_l'=>$teacher_l, 'labno'=>$labno, 'sysno'=>$sysno, 'problem'=>$problem);
            $msg="Complaint Rejection Mail";
            Mail::send(['text'=>'mail_reject'], $data, function($message) use ($email,$fname,$lname,$date_of_complaint,$justification,$teacher_f,$teacher_l, $labno, $sysno, $problem){
               
               $message->to($email, 'Lab Maintenance')->subject
                  ('Lab Maintenance Complaint Rejection Mail');
               $message->from('shrivastavaman171@gmail.com','Lab Maintenance');
            });
            // echo "Basic Email Sent. Check your inbox.";


            DB::table('complaints')->where([
                ['comp_no', '=', $comp_no]])->delete();

        
        }

        $fac_details=DB::table('faculty')->where(['sdrn'=>$sdrn])->get();
        $complaint=DB::table('complaints')->where(['sdrn'=>$sdrn])->get();

        return view('teacher')->with('complaint',$complaint)->with('fac_details',$fac_details);
        
    }
    
    public function admin(Request $request)
    {

        if($request->input('username') != ""){
            // echo "Init login";
            $username=$request->input('username');
            $pass2=$request->input('pass2');
        }
        else{
            // echo "Session login";
            $username = $request->session()->get('admin');
            $pass2 = $request->session()->get('pass2');
        }

        // $username=$request->input('username');
        // $pass2=$request->input('pass2');
        
        $check=DB::table('admin_login')->where(['username'=>$username,'pass'=>$pass2])->get();
        
        if(count($check)>0)    
        {
            $request->session()->put('admin', $username);
            $request->session()->put('pass2', $pass2);

            $f = $check[0]->floor;

            $request->session()->put('floor', $f);
            // $floor=DB::table('admin_login')->where(['username'=>$username,'pass'=>$pass2])->get();

            $complaint=DB::table('complaints')->where(['floor'=>$f])->get();

            $complaint_frequency=DB::table('complaints_frequency')->where(['floor'=>$f])->get();

            return view('admin_home')->with('complaint',$complaint)->with('admin',$username)->with('complaint_frequency',$complaint_frequency);
        }   
        else 
        {
            return view('student_login');
        } 
    }

    public function hod(Request $request)
    {
        // $hodname=$request->input('hodname');
        // $pass3=$request->input('pass3');

        if($request->input('hodname') != ""){
            // echo "Init login";
            $hodname=$request->input('hodname');
            $pass3=$request->input('pass3');
        }
        else{
            // echo "Session login";
            $hodname = $request->session()->get('hodname');
            $pass3 = $request->session()->get('pass3');
        }
        
        $check=DB::table('hod_login')->where(['username'=>$hodname,'pass'=>$pass3])->get();

        if(count($check)>0 && $check[0]->floor!=7)    
        {
            $request->session()->put('hodname', $hodname);
            $request->session()->put('pass3', $pass3);

            $f = $check[0]->floor;
            $request->session()->put('floor', $f);

            $complaint=DB::table('complaints')->where(['floor'=>$f])->get();
            
            return view('hod_home')->with('complaint',$complaint)->with('hodname',$hodname);
        }   
        else {
            return view('student_login');
        } 
    }

    public function principal(Request $request)
    {
        if($request->input('p_name') != ""){
            $p_name=$request->input('p_name');
            $pass4=$request->input('pass4');
        }
        else{
            $p_name = $request->session()->get('p_name');
            $pass4 = $request->session()->get('pass4');
        }
        
        $check=DB::table('hod_login')->where(['username'=>$p_name,'pass'=>$pass4])->get();

        if(count($check)>0 && $check[0]->floor==7)    
        {
            $request->session()->put('p_name', $p_name);
            $request->session()->put('pass4', $pass4);

            $f = $check[0]->floor;
            $request->session()->put('floor', $f);

            $complaint=DB::table('complaints')->get();
            
            return view('principal_home')->with('complaint',$complaint);
        }   
        else {
            return view('student_login');
        } 
    }

    public function datasubmitted(Request $request){
        
        $floor=$request->input('floor');
        $labno=$request->input('lab');
        $otherfield=$request->input('otherfield');
        echo $otherfield;
        $systemno="";
        if(!empty($_POST['chk'])){
            foreach($_POST['chk'] as $selected){        
                if (strlen($systemno)==0)
                    {$systemno = "".$selected;
                }
                else{
                    $systemno=strval($systemno).",".strval($selected);
                }
            }
        }
        $rollno = $request->session()->get('rollno');
        $sdrn=$request->input('sdrn');

        $check = "";
        if(!empty($_POST['problem'])){
            foreach($_POST['problem'] as $selected){  
                if (strlen($check)==0)
                    {$check = "".$selected;
                }
                else{
                    $check=strval($check).",".strval($selected);
                }
            }
        }
        $des=$request->input('description');
        $current_date_time = Carbon::now()->toDateTimeString();

        if($otherfield==NULL)
        {
            DB::table('complaints')->insert(
                ['floor'=>$floor,'labno'=>$labno,'sysno'=>$systemno,'rollno'=>$rollno,'sdrn'=>$sdrn,'problem'=>$check ,'description' =>$des,'status'=>0, 'created_at'=>$current_date_time, 'updated_at'=>$current_date_time]
            );
        }
        else{
                DB::table('complaints')->insert(
                    ['floor'=>$floor,'labno'=>$labno,'sysno'=>$systemno,'rollno'=>$rollno,'sdrn'=>$sdrn,'problem'=>$otherfield ,'description' =>$des,'status'=>0, 'created_at'=>$current_date_time, 'updated_at'=>$current_date_time]
                );
        }

        return view('data_submited');
    }

    public function datasubmitted_fac(Request $request){
        
        $floor=$request->input('floor');
        $labno=$request->input('lab');

        $systemno="";
        if(!empty($_POST['chk'])){
            foreach($_POST['chk'] as $selected){        
                if (strlen($systemno)==0)
                {
                    $systemno = "".$selected;
                }
                else
                {
                    $systemno=strval($systemno).",".strval($selected);
                }
            }
        }
        
        $sdrn=$request->session()->get('sdrn');

        $check = "";
        if(!empty($_POST['problem'])){
            foreach($_POST['problem'] as $selected){  
                if (strlen($check)==0)
                    {$check = "".$selected;
                }
                else{
                    $check=strval($check).",".strval($selected);
                }
            }
        }
        $des=$request->input('description');
        $current_date_time = Carbon::now()->toDateTimeString();

        DB::table('complaints')->insert(
            ['floor'=>$floor,'labno'=>$labno,'sysno'=>$systemno,'rollno'=>'NULL','sdrn'=>$sdrn,'problem'=>$check ,'description' =>$des,'status'=>1, 'created_at'=>$current_date_time, 'updated_at'=>$current_date_time]
        );

        return view('data_submited_fac');
    }


    /*@return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'INDEX';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}