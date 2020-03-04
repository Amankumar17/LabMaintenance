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

        $uniqueLab = DB::table('floor_lab')
        ->select('labno')
        ->where('floor',$floor)
        ->get();

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

        // $floor = $request->session()->get('floor');

        // $uniqueLab = DB::table('floor_lab')
        // ->select('labno')
        // ->where('floor',$floor)
        // ->get();

        $uniqueFloor = DB::table('floor_lab')
        ->select('floor')
        ->groupBy('floor')
        ->get();

        $check=DB::table('floor_lab')->get();

        $complaintTable = DB::table('complaints')
            ->where ( 'labno', 'LIKE', '%' . $labno . '%' )
            ->get();

        if (count ($complaintTable) > 0)
            return view ( 'principal_search' )->with('floor',$uniqueFloor)->with('systems',$check)->withDetails ( $complaintTable )->withQuery ( $labno );
        else
            return view ( 'principal_search' )->with('floor',$uniqueFloor)->with('systems',$check)->withMessage ( 'No Details found. Try to search again !' );
        }

    public function principal_lab_search(Request $request){

        $uniqueFloor = DB::table('floor_lab')
        ->select('floor')
        ->groupBy('floor')
        ->get();

        $check=DB::table('floor_lab')->get();

        // $floor_lab = DB::table('floor_lab')
        // ->get();

        return view('principal_search')->with('floor',$uniqueFloor)->with('systems',$check);
    }






    public function status_admin_confirm(Request $request){

        $srno = $request->input('srno');

        $current_date_time = Carbon::now()->toDateTimeString();

        $admin = $request->session()->get('admin');

        $c_f = DB::table('complaints_frequency')->where('srno',$srno)->get();

        $comp_nos = [];
        $comp_nos = explode(',', $c_f[0]->comp_nos);

        for($i=0; $i<count($comp_nos); $i++){
            DB::table('complaints')->where('comp_no',$comp_nos[$i])->update(
                ['status'=>2, 'updated_at'=>$current_date_time]);
        }

        DB::table('complaints_frequency')->where('srno',$srno)->update(
            ['status'=>2]);

        $f = $request->session()->get('floor');
        $complaint=DB::table('complaints')->where(['floor'=>$f])->get();
        $complaint_frequency=DB::table('complaints_frequency')->where(['floor'=>$f])->get();
        
        return view('admin_home')->with('complaint',$complaint)->with('admin',$admin)->with('complaint_frequency',$complaint_frequency);
    }
    
    public function status_admin_done(Request $request){

        $srno = $request->input('srno');

        $current_date_time = Carbon::now()->toDateTimeString();

        $admin = $request->session()->get('admin');

        $c_f = DB::table('complaints_frequency')->where('srno',$srno)->get();

        $comp_nos = [];
        $comp_nos = explode(',', $c_f[0]->comp_nos);

        for($i=0; $i<count($comp_nos); $i++){

            $c = DB::table('complaints')->where('comp_no',$comp_nos[$i])->get();
            $fname;
            $lname;
            $date_of_complaint = date('d M Y', strtotime($c[0]->created_at));
            if($c[0]->rollno!='NULL'){
                $rollno = $c[0]->rollno;
                $f = DB::table('stu_record')->where('Roll_no',$rollno)->get();
                $email = $f[0]->emailid;
                $fname = $f[0]->First_name;
                $lname = $f[0]->Last_name;
            }
            else{
                $sdrn = $c[0]->sdrn;
                $f = DB::table('faculty')->where('Sdrn',$sdrn)->get();
                $email = $f[0]->Email;
                $fname = $f[0]->First_name;
                $lname = $f[0]->Last_name;
            }

            $data = array('name'=>"Lab Maintenance",'fname'=>$fname,'lname'=>$lname,'date_of_complaint'=>$date_of_complaint);
            $msg="Mail confirmation";
            Mail::send(['text'=>'mail'], $data, function($message) use ($email,$fname,$lname,$date_of_complaint){
            
            $message->to($email, 'Lab Maintenance')->subject
                ('Lab Maintenance Testing Mail');
            $message->from('shrivastavaman171@gmail.com','Lab Maintenance');
            });
            
            DB::table('complaints')->where('comp_no',$comp_nos[$i])->update(
                ['status'=>3, 'updated_at'=>$current_date_time]);
        }

        DB::table('complaints_frequency')->where('srno',$srno)->delete();

        echo '<script>alert("Thank you, the email sent has been sent.")</script>';
        
        $f = $request->session()->get('floor');
        $complaint=DB::table('complaints')->where(['floor'=>$f])->get();
        $complaint_frequency=DB::table('complaints_frequency')->where(['floor'=>$f])->get();
        
        return view('admin_home')->with('complaint',$complaint)->with('admin',$admin)->with('complaint_frequency',$complaint_frequency);
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

        $admin = $request->session()->get('admin');
        $current_date = Carbon::now()->toDateString();

        DB::table('system_logs')->insert(
            ['lab_source' => $labno, 'sysno_source' => $new, 'admin' => $admin, 'action' => 'add', 'Date'=> $current_date]
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

        $admin = $request->session()->get('admin');
        $current_date = Carbon::now()->toDateString();

        DB::table('system_logs')->insert(
            ['lab_source' => $labno, 'sysno_source' => $pc, 'lab_target' => $labno1, 'sysno_target' => $pc, 'admin' => $admin, 'action' => 'tranfer', 'Date'=> $current_date]
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

        $admin = $request->session()->get('admin');
        $current_date = Carbon::now()->toDateString();

        DB::table('system_logs')->insert(
            ['lab_source' => $labno, 'sysno_source' => $old, 'admin' => $admin, 'action' => 'remove', 'Date'=> $current_date]
        );

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


    public function admin_manage_issue_insert(Request $request){

        $issue = $request->input('issue');
        
        $floor = $request->session()->get('floor');

        DB::table('common_issues')->insert(
            ['issue' => $issue, 'floor' => $floor]
        );

            return view('manage_issue');
    }


    public function admin_manage_issue(Request $request){

       
        $floor = $request->session()->get('floor');
        
        $uniqueissue = DB::table('common_issues')
        ->select('issue')
        ->where('floor',$floor)
        ->get();

        return view('manage_issue_delete')->with('issue',$uniqueissue);

            
    }

    public function admin_manage_issue_delete(Request $request){


        $floor = $request->session()->get('floor');

         $issue = $request->input('issue');

         DB::table('common_issues')->where([
            ['floor', '=', $floor],
            ['issue', '=', $issue]])->delete();


            return view('manage_issue');

    }



    public function admin_deadstock_form(Request $request){

        $Srno = $request->input('srno');
        $Date = $request->input('date');
        $Name_of_item = $request->input('name_of_item');


        $Description = $request->input('description');
        if($Description=='')
            $Description='-';
        $Warranty = $request->input('warranty');
        if($Warranty=='')
            $Warranty='-';
        $Quantity = $request->input('quantity');
        if($Quantity=='')
            $Quantity='-';
        $Amount = $request->input('amount');
        if($Amount=='')
            $Amount='-';
        $Supplier = $request->input('supplier');
        if($Supplier=='')
            $Supplier='-';
        $GPR_Refno = $request->input('gpr_refno');
        if($GPR_Refno=='')
            $GPR_Refno='-';
        $Billno = $request->input('bill_no');
        if($Billno=='')
            $Billno='-';
        $Purchase_Date = $request->input('purchase_date');
        if($Purchase_Date=='')
            $Purchase_Date='-';
        $Disposal = $request->input('disposal');
        if($Disposal=='')
            $Disposal='-';
        $Remarks = $request->input('remark');
        if($Remarks=='')
            $Remarks='-';


        DB::table('deadstock')->insert(
            ['Srno'=>$Srno,'Date'=>$Date,'Name_of_item'=>$Name_of_item,'Description'=>$Description,'Warranty'=>$Warranty,'Quantity'=>$Quantity ,'Amount' =>$Amount,'GPR_Refno'=>$GPR_Refno, 'Supplier'=>$Supplier, 'Billno'=>$Billno, 'Purchase_Date'=>$Purchase_Date, 'Disposal'=>$Disposal, 'Remarks'=>$Remarks]
        );
        
        return view('admin_deadstock');
    }

    public function search_action(Request $request){
        $action = $request->input('action');

        if($action=='all'){
            $sys_logs = DB::table('system_logs')
                        ->get();
        }
        else{
            $sys_logs = DB::table('system_logs')
                        ->where('action',$action)
                        ->get();
        }

        if (count ($sys_logs) > 0)
            return view ( 'system_logs' )->withDetails ( $sys_logs )->withQuery ( $action );
        else
            return view ( 'system_logs' )->withMessage ( 'No Details found. Try to search again !' );
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
