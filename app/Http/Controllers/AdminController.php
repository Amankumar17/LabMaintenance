<?php
     
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller {

    public function systemadd(Request $request){

        $labno = $request->input('labno');
        $new = $request->input('newsys');
        echo $labno;
        echo $new;

        DB::table('systems')->insert(
            ['labno' => $labno, 'sys' => $new]
        );

        // return view('/admin_home');
        echo "<br/>Record inserted successfully.<br/>";
        
    }

    public function systemRemove(Request $request){

        $labno = $request->input('labno');
        $old = $request->input('oldsys');
        echo $labno;
        echo $old;

        DB::table('systems')->where([
            ['labno', '=', $labno],
            ['sys', '=', $old]])->delete();

        echo "<br/>Record deleted successfully.<br/>";
    }

    public function facultyAdd(Request $request){

        $newsdrn = $request->input('newsdrn');
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        echo $newsdrn;
        echo $pass1;
        echo $pass2;

        if($pass1 == $pass2) {
            DB::table('faculty_logins')->insert(
                ['sdrn' => $newsdrn, 'pass' => $pass1]
            );
    
            // return view('/admin_home');
            echo "<br/>Record inserted successfully.<br/>";
        } 
    }

    public function facultyRemove(Request $request){

        $labno = $request->input('labno');
        $old = $request->input('oldsys');
        echo $labno;
        echo $old;

        DB::table('systems')->where([
            ['labno', '=', $labno],
            ['sys', '=', $old]])->delete();

        echo "<br/>Record deleted successfully.<br/>";
    }
    
    public function delsys(Request $request)
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

        
        return view('admin_del_system')->with('systems',$check)->with('lab',$uniqueLab);
        //return view('admin_del_system')->with('lab',$systems);
    }


    public function adminAdd(Request $request){

        $newname = $request->input('newname');
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        echo $newname;
        echo $pass1;
        echo $pass2;

        DB::table('admin_login')->insert(
            ['username' => $newname, 'pass' => $pass1]
        );

        // return view('/admin_home');
        echo "<br/>Record inserted successfully.<br/>";
        
    }


    public function addremove(Request $request){

        $admin = $request->input('admin');
        $pass = $request->input('pass');
        echo $admin;
        echo $pass;

        DB::table('admin_login')->where([
            ['username', '=', $admin],
            ['pass', '=', $pass]])->delete();

        echo "<br/>Record deleted successfully.<br/>";
    }











    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
