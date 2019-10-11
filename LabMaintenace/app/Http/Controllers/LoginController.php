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
        // echo $check;
        // echo count($check);
        if(count($check)>0)    
        {
            $complaint=DB::table('complaints')->where(['rollno'=>$rollno])->get();
            //echo($complaint);
            return view('student')->with('complaint',$complaint);
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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