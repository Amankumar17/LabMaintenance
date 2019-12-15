<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class LoginController extends BaseController
{

    public function feedback(Request $request)
    {
        // $rollno=$request->input('rollno');
        // $pass=$request->input('pass');

        if($request->input('rollno') != ""){
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

            $table2 = $table2->sort();
            // echo $table2;
            // $uniqueFloor = $uniqueFloor->sort();

            $complaint=DB::table('complaints')->get();

            return view('feedback')->with('floor_lab',$table1)->with('systems',$table2)->with('floors',$uniqueFloor)->with('lab',$uniqueLab)->with('stud_details',$stud_details)->with('complaint',$complaint);
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

        $current_date_time = Carbon::now()->toDateTimeString();

        $sdrn = $request->session()->get('sdrn');

        if (isset($_POST['Confirm'])) {
            
            DB::table('complaints')->where('comp_no',$comp_no)->update(
                ['status'=>1, 'updated_at'=>$current_date_time]);
                
        } else if (isset($_POST['Reject'])) {

            DB::table('complaints')->where([
                ['comp_no', '=', $comp_no]])->delete();

            // $c = DB::table('complaints')->where('comp_no',$comp_no)->get();

            // $rollno = $c[0]->rollno;

            // $f = DB::table('stu_record')->where('Roll_no',$rollno)->get();
            // $email = $f[0]->emailid;
            
            // $to= $email;;
            // $subject="testing";
            // $msg="Sorry, your complaint has been rejected";
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
            
            return view('admin_home')->with('complaint',$complaint)->with('admin',$username);
        }   
        else {
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

        DB::table('complaints')->insert(
            ['floor'=>$floor,'labno'=>$labno,'sysno'=>$systemno,'rollno'=>$rollno,'sdrn'=>$sdrn,'problem'=>$check ,'description' =>$des,'status'=>0, 'created_at'=>$current_date_time, 'updated_at'=>$current_date_time]
        );

        return view('data_submited');
    }

    public function datasubmitted_fac(Request $request){
        
        $floor=$request->input('floor');
        $labno=$request->input('lab');

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