<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

/*
namespace App\Http\Controllers;
use Illuminate\App\student_login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;*/

class LoginController extends BaseController
{

    public function login(Request $request)
    {
        $rollno=$request->input('rollno');
        $pass=$request->input('pass');
        
        $check=DB::table('student_logins')->where(['rollno'=>$rollno,'pass'=>$pass])->get();
        $stud_details=DB::table('stu_record')->where(['Roll_no'=>$rollno])->get();        
        // echo $check;
        // echo count($check);
        // echo $stud_details;
        if(count($check)>0)
        {
            $complaint=DB::table('complaints')->where(['rollno'=>$rollno])->get();
            //echo($complaint);
            return view('student')->with('complaint',$complaint)->with('stud_details',$stud_details);
            
        }   
        else {
            # code...
            echo("login fail");
            return view('login');
            
        } 
        /*
        $student = new student_logins;

        $student->rollno=$request['rollno'];
        $student->pass=$request['password'];
        $student->save();*/

        // $users = DB::table('student_logins')->select('rollno','pass')->get();
        // echo $users;
        // $credentials = $request->only('rollno', 'pass');
        // echo $credentials[1];
        // $sql_query = "select * from student_logins where rollno="+(string)$request['rollno']+" && pass="+(string)$request['pass']+";";
        // $result = DB::select(DB::raw($sql_query));
        // echo $result;
        
    }


   
    public function teacher(Request $request)
    {
        $sdrn=$request->input('sdrn');
        $pass1=$request->input('pass1');
        
        $check=DB::table('faculty_logins')->where(['sdrn'=>$sdrn,'pass'=>$pass1])->get();
        $fac_details=DB::table('faculty')->where(['sdrn'=>$sdrn])->get();
        // echo $check;
        // echo count($check);
        if(count($check)>0)    
        {
            $complaint=DB::table('complaints')->where(['sdrn'=>$sdrn])->get();
            //echo($complaint);
            return view('teacher')->with('complaint',$complaint)->with('fac_details',$fac_details);
        }
        else {
            # code...
            echo("login fail");
            return view('login');
            
        } 
        
    }
    
    public function admin(Request $request)
    {
        $username=$request->input('username');
        $pass2=$request->input('pass2');
        
        $check=DB::table('admin_login')->where(['username'=>$username,'pass'=>$pass2])->get();
        //echo $check;
        //echo count($check);
        if(count($check)>0)    
        {
            $complaint=DB::table('complaints')->get();
            //echo($complaint);
            return view('admin_home')->with('complaint',$complaint);
        }   
        else {
            # code...
            echo("login fail");
            return view('login');
            
        } 
    }
    public function system(Request $request)
    {
        //$op=$request->input("op");
        //echo $op;
        $check=DB::table('systems')->get();
        $uniqueLab = DB::table('systems')
        ->select('labno')
        ->groupBy('labno')
        ->get();
        //$uniqueNames = DB::select('labno')->distinct('labno')->toArray();
        $check = $check->sort();
        // echo $check;
        // echo "sDDASD";
        // echo $uniqueLab;
        //echo count($check);

        
        return view('student_com')->with('systems',$check)->with('lab',$uniqueLab);
        
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