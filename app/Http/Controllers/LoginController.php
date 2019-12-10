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

    public function login(Request $request)
    {
        $rollno=$request->input('rollno');
        $pass=$request->input('pass');
        
        $check=DB::table('student_logins')->where(['rollno'=>$rollno,'pass'=>$pass])->get();
        $stud_details=DB::table('stu_record')->where(['Roll_no'=>$rollno])->get();        

        if(count($check)>0)
        {
            $complaint=DB::table('complaints')->where(['rollno'=>$rollno])->get();
            
            return view('student')->with('complaint',$complaint)->with('stud_details',$stud_details);
            
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

    public function studenthistory_to_feedback(Request $request)
    {
        $rollno = $request->session()->get('rollno');

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
        // $uniqueFloor = $uniqueFloor->sort();

        $complaint=DB::table('complaints')->get();

        return view('feedback')->with('floor_lab',$table1)->with('systems',$table2)->with('floors',$uniqueFloor)->with('lab',$uniqueLab)->with('stud_details',$stud_details)->with('complaint',$complaint);
    

        // return view('feedback')->with('complaint',$complaint)->with('stud_details',$stud_details);
            
    }

    public function teacher_feedback(Request $request)
    {
        $sdrn = $request->session()->get('sdrn');

        // $stud_details=DB::table('stu_record')->where(['Roll_no'=>$rollno])->get();        
        
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
        // $uniqueFloor = $uniqueFloor->sort();

        $complaint=DB::table('complaints')->get();

        return view('teacher_feedback')->with('sdrn',$sdrn)->with('floor_lab',$table1)->with('systems',$table2)->with('floors',$uniqueFloor)->with('lab',$uniqueLab)->with('complaint',$complaint);
    

        // return view('feedback')->with('complaint',$complaint)->with('stud_details',$stud_details);
            
    }
    

    public function teacher(Request $request)
    {
        $sdrn=$request->input('sdrn');
        $pass1=$request->input('pass1');
        
        $check=DB::table('faculty_logins')->where(['sdrn'=>$sdrn,'pass'=>$pass1])->get();
        // echo $request->session()->get('user');

        if(count($check)>0)    
        {
            $request->session()->put('sdrn', $sdrn);

            $fac_details=DB::table('faculty')->where(['sdrn'=>$sdrn])->get();
            $complaint=DB::table('complaints')->where(['sdrn'=>$sdrn])->get();
            
            return view('teacher')->with('complaint',$complaint)->with('fac_details',$fac_details);
        }
        else {
            return view('student_login');
        } 
    }

    public function status_teacher_confirm(Request $request){

        $comp_no = $request->input('comp_no');

        // echo $request->session()->get('user');
        // echo $comp_no;

        $current_date_time = Carbon::now()->toDateTimeString();

        $sdrn = $request->session()->get('sdrn');

        if (isset($_GET['Confirm'])) {
            
            DB::table('complaints')->where('comp_no',$comp_no)->update(
                ['status'=>1, 'updated_at'=>$current_date_time]);
                
        } else if (isset($_GET['Reject'])) {

            DB::table('complaints')->where([
                ['comp_no', '=', $comp_no]])->delete();
        }
        

        $fac_details=DB::table('faculty')->where(['sdrn'=>$sdrn])->get();
        $complaint=DB::table('complaints')->where(['sdrn'=>$sdrn])->get();

        return view('teacher')->with('complaint',$complaint)->with('fac_details',$fac_details);
        
    }
    
    public function admin(Request $request)
    {
        $username=$request->input('username');
        $pass2=$request->input('pass2');
        
        $check=DB::table('admin_login')->where(['username'=>$username,'pass'=>$pass2])->get();

        if(count($check)>0)    
        {
            $request->session()->put('admin', $username);

            $f = $check[0]->floor;
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
        $hodname=$request->input('hodname');
        $pass3=$request->input('pass3');
        
        $check=DB::table('hod_login')->where(['username'=>$hodname,'pass'=>$pass3])->get();

        if(count($check)>0)    
        {
            $request->session()->put('hodname', $hodname);

            $f = $check[0]->floor;
            $request->session()->put('floor', $f);

            // $floor=DB::table('admin_login')->where(['username'=>$username,'pass'=>$pass2])->get();

            $complaint=DB::table('complaints')->where(['floor'=>$f])->get();
            
            return view('hod_home')->with('complaint',$complaint)->with('hodname',$hodname);
        }   
        else {
            return view('student_login');
            
        } 
    }

    public function feedback(Request $request)
    {
        
        $rollno=$request->input('rollno');
        $pass=$request->input('pass');
        
        $check=DB::table('student_logins')->where(['rollno'=>$rollno,'pass'=>$pass])->get();        

        if(count($check)>0)
        {
            $request->session()->put('rollno', $rollno);

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
            // $uniqueFloor = $uniqueFloor->sort();

            $complaint=DB::table('complaints')->get();

            return view('feedback')->with('floor_lab',$table1)->with('systems',$table2)->with('floors',$uniqueFloor)->with('lab',$uniqueLab)->with('stud_details',$stud_details)->with('complaint',$complaint);
        }   
        else {
            return view('student_login');   
        }
    }
    
    public function system(Request $request)
    {
        
        $rollno=$request->input('rollv');
        $check=DB::table('systems')->get();
        $uniqueLab = DB::table('systems')
        ->select('labno')
        ->groupBy('labno')
        ->get();
        echo $check;
        $stud_details=DB::table('stu_record')->where(['Roll_no'=>$rollno])->get();
        //$uniqueNames = DB::select('labno')->distinct('labno')->toArray();
        $check = $check->sort();
        // echo $check;
        // echo "sDDASD";
        // echo $uniqueLab;
        //echo count($check);
        // return view('student_com')->with('systems',$check)->with('lab',$uniqueLab)->with('stud_details',$stud_details);
        
        $complaint=DB::table('complaints')->get();
        //echo($complaint);
        return view('student_com')->with('systems',$check)->with('lab',$uniqueLab)->with('stud_details',$stud_details)->with('complaint',$complaint);

    }

    public function system_for_fac(Request $request)
    {
        $sdrn=$request->input('sdrnv');
        $check=DB::table('systems')->get();

        $uniqueLab = DB::table('systems')
        ->select('labno')
        ->groupBy('labno')
        ->get();
        
        $fac_details=DB::table('faculty')->where(['Sdrn'=>$sdrn])->get();
        $check = $check->sort();
        
        $complaint=DB::table('complaints')->get();
        return view('teacher_com')->with('systems',$check)->with('lab',$uniqueLab)->with('fac_details',$fac_details)->with('complaint',$complaint);
        
    }

    public function datasubmitted(Request $request){
        
        $floor=$request->input('floor');
        $labno=$request->input('lab');

        $systemno="";
        if(!empty($_GET['chk'])){
            foreach($_GET['chk'] as $selected){        
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
        if(!empty($_GET['problem'])){
            foreach($_GET['problem'] as $selected){  
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
        if(!empty($_GET['chk'])){
            foreach($_GET['chk'] as $selected){        
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
        if(!empty($_GET['problem'])){
            foreach($_GET['problem'] as $selected){  
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

    public function check_input(Request $request){
        $x=[];
        $p=$request->input('description');
        echo $p;
        $rollno=$request->input('rollno');
        $name=$request->input('stud_name');
        $labno=$request->input('op');
        $systemno=$request->input('system');
        $sdrn=$request->input('sdrn');

        // echo $rollno;
        // echo $name;
        // echo $labno;
        // echo $systemno;
        // echo $sdrn;



        // if ('mouse'==$request->input('mouse')){
        //     array_push($x,'mouse');
        // }
        // if('keyboard'==$request->input('keyboard')){
        //     array_push($x,'keyboard');
        // }
        // if('monitor'==$request->input('monitor')){
        //     array_push($x,'monitor');
        // }
        // if('cpu'==$request->input('cpu')){
        //     array_push($x,'cpu');
        // }
        // if('printer'==$request->input('printer')){
        //     array_push($x,'printer');
        // }
        // if('other'==$request->input('other')){
        //     array_push($x,'other');
        // }
        
        // //$c1=$request->input('a');
        // echo json_encode($x);
        // //echo 'abc';
        // $str=(string)$x;
        // echo $x;
        // for($i=0;$i<count($x);$i++)
        // {
        //     $str = $str + $x[$i];
        // }
        
        // echo $str;
        // DB::table('complaints')->insert(
           // ['labno'=>$labno,'sysno'=>$systemno,'rollno'=>$rollno,'sdrn'=>$sdrn ,'description' =>$p,'status'=>0]
        //);
        //INSERT INTO `complaints` (`comp_no`, `labno`, `sysno`, `rollno`, `sdrn`, `description`, `status`, `created_at`, `updated_at`) VALUES (NULL, '520', 'b1', '17CE3003', '476', 'lan wire', '0', NOW(), NOW());
        // DB::table('admin_login')->insert(
        //     ['username' => $newname, 'pass' => $pass1]
        // );
        return view('filecomplaint')->with('rollno',$rollno)->with('sdrn',$sdrn)->with('labno',$labno)->with('systemno',$systemno);

    }
    public function check_input1(Request $request){
        $p=$request->input('description');
        $rollno=$request->input('rollno');
        $labno=$request->input('op');
        $systemno=$request->input('system');
        $sdrn=$request->input('sdrn');

        $current_date_time = Carbon::now()->toDateTimeString();

        echo $rollno;
        echo $labno;
        echo $systemno;
        echo $sdrn;
        DB::table('complaints')->insert(
            ['labno'=>$labno,'sysno'=>$systemno,'rollno'=>$rollno,'sdrn'=>$sdrn ,'description' =>$p,'status'=>0, 'created_at'=>$current_date_time, 'updated_at'=>$current_date_time]
        );

    }

    public function check_input2(Request $request){
        $x=[];
        $p=$request->input('description');
        echo $p;

        $labno=$request->input('op');
        $systemno=$request->input('system');
        $sdrn=$request->input('sdrn');

        return view('filecomplaint2')->with('sdrn',$sdrn)->with('labno',$labno)->with('systemno',$systemno);

    }

    public function check_input3(Request $request){
        $p=$request->input('description');
        $labno=$request->input('op');
        $systemno=$request->input('system');
        $sdrn=$request->input('sdrn');

        $current_date_time = Carbon::now()->toDateTimeString();

        echo $labno;
        echo $systemno;
        echo $sdrn;
        DB::table('complaints')->insert(
            ['labno'=>$labno,'sysno'=>$systemno,'rollno'=>'NULL','sdrn'=>$sdrn ,'description' =>$p,'status'=>1, 'created_at'=>$current_date_time, 'updated_at'=>$current_date_time]
        );

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