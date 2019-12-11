<?php
     
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdminController extends Controller {


    public function admin_search(Request $request){
        $q = $request->input('q');

        $floor = $request->session()->get('floor');

        $complaint = DB::table('complaints')
            ->where('floor', '=', $floor)
            ->where ( 'comp_no', 'LIKE', '%' . $q . '%' )
            ->orwhere ( 'labno', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'sysno', 'LIKE', '%' . $q . '%' )
            ->orwhere ( 'rollno', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'sdrn', 'LIKE', '%' . $q . '%' )
            ->orwhere ( 'problem', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'description', 'LIKE', '%' . $q . '%' )
            ->get();
    
        if (count ( $complaint ) > 0)
            return view ( 'admin_search' )->withDetails ( $complaint )->withQuery ( $q );
        else
            return view ( 'admin_search' )->withMessage ( 'No Details found. Try to search again !' );
    }

    public function status_admin_confirm(Request $request){

        $comp_no = $request->input('comp_no');

        $current_date_time = Carbon::now()->toDateTimeString();

        $admin = $request->session()->get('admin');

        DB::table('complaints')->where('comp_no',$comp_no)->update(
            ['status'=>2, 'updated_at'=>$current_date_time]);

            $complaint=DB::table('complaints')->get();
            
            return view('admin_home')->with('complaint',$complaint)->with('admin',$admin);
        
    }
    
    public function status_admin_done(Request $request){

        $comp_no = $request->input('comp_no');

        $current_date_time = Carbon::now()->toDateTimeString();

        $admin = $request->session()->get('admin');

        DB::table('complaints')->where('comp_no',$comp_no)->update(
            ['status'=>3, 'updated_at'=>$current_date_time]);

            $complaint=DB::table('complaints')->get();
            
            return view('admin_home')->with('complaint',$complaint)->with('admin',$admin);
        
    }

    public function systemAdd2(Request $request)
    {
        $floor = $request->session()->get('floor');

        // $check=DB::table('systems')->get();
        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        // $check = $check->sort();

        return view('admin_add_system')->with('lab',$uniqueLab);

        // ->with('systems',$check)
        
    }
    
    public function systemAdd(Request $request){

        $labno = $request->input('labno');
        $new = $request->input('newsys');

        DB::table('systems')->insert(
            ['labno' => $labno, 'sys' => $new]
        );

        // $floor = $request->session()->get('floor');
        // $username = $request->session()->get('admin');
        // $complaint=DB::table('complaints')->where(['floor'=>$floor])->get();
            
        // return view('admin_home')->with('complaint',$complaint)->with('admin',$username);

        return view('/admin_operation');
        
    }

    public function systemRemove2(Request $request)
    {
        $floor = $request->session()->get('floor');

        $check=DB::table('systems')->get();

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        $check = $check->sort();


        return view('admin_del_system')->with('systems',$check)->with('lab',$uniqueLab);
        
    }

    public function systemRemove(Request $request){

        $labno = $request->input('labno');
        $old = $request->input('oldsys');
        

        DB::table('systems')->where([
            ['labno', '=', $labno],
            ['sys', '=', $old]])->delete();


        // $floor = $request->session()->get('floor');
        // $username = $request->session()->get('admin');
        // $complaint=DB::table('complaints')->where(['floor'=>$floor])->get();
            
        // return view('admin_home')->with('complaint',$complaint)->with('admin',$username);

        return view('/admin_operation');
    }


    public function facultyAdd(Request $request){

        $newsdrn = $request->input('newsdrn');
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');

        if($pass1 == $pass2) {
            DB::table('faculty_logins')->insert(
                ['sdrn' => $newsdrn, 'pass' => $pass1]
            );
    
            return view('/admin_operation');
        } 
    }

    public function facultyRemove(Request $request){

        $oldsdrn = $request->input('oldsdrn');
        $pass = $request->input('pass');
        

        DB::table('faculty_logins')->where([
            ['sdrn', '=', $oldsdrn],
            ['pass', '=', $pass]])->delete();

            return view('/admin_operation');
    }
    


    public function adminAdd(Request $request){

        $newname = $request->input('newname');
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        
        $floor = $request->session()->get('floor');

        DB::table('admin_login')->insert(
            ['username' => $newname, 'pass' => $pass1, 'floor' => $floor]
        );

        return view('/admin_operation');
        
    }

    public function adminRemove(Request $request){

        $admin = $request->input('admin');
        $pass = $request->input('pass');
        
        $floor = $request->session()->get('floor');

        DB::table('admin_login')->where([
            ['username', '=', $admin],
            ['pass', '=', $pass],
            ['floor', '=', $floor]])->delete();

            return view('/admin_operation');
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
