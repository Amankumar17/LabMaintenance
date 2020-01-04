<?php
     
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdminController extends Controller {


    public function admin_search(Request $request){
        $q = $request->input('q');

        // $labno = $request->input('labno');

        // echo $labno;

        $floor = $request->session()->get('floor');

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        // $complaintTable = DB::table('complaints')
        //     ->where ( 'labno', 'LIKE', '%' . $labno . '%' )
        //     ->get();
    
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
            return view ( 'admin_search' )->with('lab',$uniqueLab)->withDetails ( $complaint )->withQuery ( $q );
        // elseif (count ($complaintTable) > 0)
        //     return view ( 'admin_search' )->with('lab',$uniqueLab)->withDetails ( $complaintTable )->withQuery ( $labno );
        else
            return view ( 'admin_search' )->with('lab',$uniqueLab)->withMessage ( 'No Details found. Try to search again !' );
    }

    public function admin_lab_search1(Request $request){

        $labno = $request->input('labno');

        $floor = $request->session()->get('floor');

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        $complaintTable = DB::table('complaints')
            ->where ( 'labno', 'LIKE', '%' . $labno . '%' )
            ->get();

        if (count ($complaintTable) > 0)
            return view ( 'admin_search' )->with('lab',$uniqueLab)->withDetails ( $complaintTable )->withQuery ( $labno );
        else
            return view ( 'admin_search' )->with('lab',$uniqueLab)->withMessage ( 'No Details found. Try to search again !' );
        }

    public function admin_lab_search(Request $request){


        $floor = $request->session()->get('floor');

        // $check=DB::table('systems')->get();

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        // $check = $check->sort();


        return view('admin_search')->with('lab',$uniqueLab);


    }








    public function hod_search(Request $request){
        $q = $request->input('q');

        // $labno = $request->input('labno');

        // echo $labno;

        $floor = $request->session()->get('floor');

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        // $complaintTable = DB::table('complaints')
        //     ->where ( 'labno', 'LIKE', '%' . $labno . '%' )
        //     ->get();
    
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
            return view ( 'hod_search' )->with('lab',$uniqueLab)->withDetails ( $complaint )->withQuery ( $q );
        // elseif (count ($complaintTable) > 0)
        //     return view ( 'admin_search' )->with('lab',$uniqueLab)->withDetails ( $complaintTable )->withQuery ( $labno );
        else
            return view ( 'hod_search' )->with('lab',$uniqueLab)->withMessage ( 'No Details found. Try to search again !' );
    }

    public function hod_lab_search1(Request $request){

        $labno = $request->input('labno');

        $floor = $request->session()->get('floor');

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        $complaintTable = DB::table('complaints')
            ->where ( 'labno', 'LIKE', '%' . $labno . '%' )
            ->get();

        if (count ($complaintTable) > 0)
            return view ( 'hod_search' )->with('lab',$uniqueLab)->withDetails ( $complaintTable )->withQuery ( $labno );
        else
            return view ( 'hod_search' )->with('lab',$uniqueLab)->withMessage ( 'No Details found. Try to search again !' );
        }

    public function hod_lab_search(Request $request){


        $floor = $request->session()->get('floor');

        // $check=DB::table('systems')->get();

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        // $check = $check->sort();


        return view('hod_search')->with('lab',$uniqueLab);


    }








    public function principal_search(Request $request){
        $q = $request->input('q');

        // $labno = $request->input('labno');

        // echo $labno;

        $floor = $request->session()->get('floor');

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        // $complaintTable = DB::table('complaints')
        //     ->where ( 'labno', 'LIKE', '%' . $labno . '%' )
        //     ->get();
    
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
            return view ( 'principal_search' )->with('lab',$uniqueLab)->withDetails ( $complaint )->withQuery ( $q );
        // elseif (count ($complaintTable) > 0)
        //     return view ( 'admin_search' )->with('lab',$uniqueLab)->withDetails ( $complaintTable )->withQuery ( $labno );
        else
            return view ( 'principal_search' )->with('lab',$uniqueLab)->withMessage ( 'No Details found. Try to search again !' );
    }

    public function principal_lab_search1(Request $request){

        $labno = $request->input('labno');

        $floor = $request->session()->get('floor');

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        $complaintTable = DB::table('complaints')
            ->where ( 'labno', 'LIKE', '%' . $labno . '%' )
            ->get();

        if (count ($complaintTable) > 0)
            return view ( 'principal_search' )->with('lab',$uniqueLab)->withDetails ( $complaintTable )->withQuery ( $labno );
        else
            return view ( 'principal_search' )->with('lab',$uniqueLab)->withMessage ( 'No Details found. Try to search again !' );
        }

    public function principal_lab_search(Request $request){

        $uniqueFloor = DB::table('floor_lab')
        ->select('floor')
        ->groupBy('floor')
        ->get();

        $floor_lab = DB::table('floor_lab')
        ->get();

        return view('principal_search')->with('floor',$uniqueFloor)->with('lab',$floor_lab);
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

        $c = DB::table('complaints')->where('comp_no',$comp_no)->get();

        if($c[0]->rollno!='NULL'){
            $rollno = $c[0]->rollno;
            $f = DB::table('stu_record')->where('Roll_no',$rollno)->get();
            $email = $f[0]->emailid;
        }
        else{
            $sdrn = $c[0]->sdrn;
            $f = DB::table('faculty')->where('Sdrn',$sdrn)->get();
            $email = $f[0]->Email;
        }
        
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

         function basic_email($email) {
            $data = array('name'=>"Lab Maintenance");
            
            Mail::send(['text'=>'mail'], $data, function($message) use ($email){
               
               $message->to($email, 'Lab Maintenance')->subject
                  ('Lab Maintenance Testing Mail');
               $message->from('shrivastavaman171@gmail.com','Lab Maintenance');
            });
            echo "Basic Email Sent. Check your inbox.";
         }

         basic_email($email);
         
        DB::table('complaints')->where('comp_no',$comp_no)->update(
            ['status'=>3, 'updated_at'=>$current_date_time]);

            
            $complaint=DB::table('complaints')->get();
            
            return view('admin_home')->with('complaint',$complaint)->with('admin',$admin);
        
    }

    public function systemAdd2(Request $request)
    {
        $floor = $request->session()->get('floor');

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        return view('admin_add_system')->with('lab',$uniqueLab);
    }

    public function transferPC1(Request $request)
    {
        $floor = $request->session()->get('floor');

        $check=DB::table('systems')->get();

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

        $check = $check->sort();

        return view('admin_transfer_pc')->with('systems',$check)->with('lab',$uniqueLab);
    }
    
    public function systemAdd(Request $request){

        $labno = $request->input('labno');
        $new = $request->input('newsys');

        DB::table('systems')->insert(
            ['labno' => $labno, 'sys' => $new]
        );

        return view('/admin_operation');
    }

    public function transferPC(Request $request){

        $labno = $request->input('labno');
        $pc = $request->input('oldsys');
        $labno1 = $request->input('labno1');
        
        DB::table('systems')->where([
            ['labno', '=', $labno],
            ['sys', '=', $pc]])->delete();
               
        DB::table('systems')->insert(
            ['labno' => $labno1, 'sys' => $pc]
        );
    
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
