<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;
use App\Charts\UserChart;
use App;

use PDF;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function chart_options(Request $request)
    {
        $floor = $request->session()->get('floor');

        $complaint=DB::table('complaints')
            ->get(['created_at']);

        $years = []; 
        for($i=0; $i<$complaint->count(); $i++){
            $timestamp = strtotime($complaint[$i]->created_at);
            array_push($years, date('Y', $timestamp)); 
        }

        $collection = collect($years);
        $unique_years = $collection->unique();
        $unique_years = $unique_years->values()->all();
        sort($unique_years);

        $table1=DB::table('floor_lab')->get();

        return view('chart_options')->with('floor', $floor)->with('unique_years', $unique_years)->with('floor_lab',$table1);
    }

    public function report_options(Request $request)
    {
        $floor = $request->session()->get('floor');
        return view('report_options')->with('floor', $floor);
    }

    public function displayReport(Request $request)
    {
        
        $status=$request->input('status');
        $start = $request->input('start');
        $end = $request->input('end');
        $order = $request->input('order');

        $p_floor = $request->input('p_floor');

        if($p_floor=='')
            $floor = $request->session()->get('floor');
        else
            $floor = $p_floor;

        if($floor!=7){
            if($status==1) {
                $complaint=DB::table('complaints')
                    ->where(['floor'=>$floor])
                    ->whereIn('status', ['2', '3'])
                    ->whereBetween('created_at', [$start, $end])
                    ->orderBy($order, 'asc')
                    ->get();
            }
            else {
                $complaint=DB::table('complaints')
                    ->where(['floor'=>$floor, 'status'=>$status])
                    ->whereBetween('created_at', [$start, $end])
                    ->orderBy($order, 'asc')
                    ->get();
            }
        }
        else{
            if($status==1) {
                $complaint=DB::table('complaints')
                    ->whereIn('status', ['2', '3'])
                    ->whereBetween('created_at', [$start, $end])
                    ->orderBy($order, 'asc')
                    ->get();
            }
            else {
                $complaint=DB::table('complaints')
                    ->where(['status'=>$status])
                    ->whereBetween('created_at', [$start, $end])
                    ->orderBy($order, 'asc')
                    ->get();
            }
        }
    
        $s1="<p style='color:#5F5B5B;float:left'>Registered on: " .date('d-m-Y', strtotime($start)). " To " .date('d-m-Y', strtotime($end)) ."</p>";

        $data ="<head><title>Report</title></head>";
        $data .= "<style>
                    table{font-family: 'Times New Roman', Times, serif;
                    }
                    th{color:black;text-align:center;padding-top: 12px;
                        padding-bottom: 12px;
                    }
                    tr:nth-child(even){background-color: #f2f2f2;}
                    td{padding: 6px;font-size:16px;}
                    
                    </style>";
         $data .= "<center style='color:black;margin-top:0px;'><h2>Registered Complaint Report</h2></center>".$s1."<br><hr><br>";
        
        $data .= "<table style='border-collapse: collapse;width:100%;'><tr><th >Comp No.</th><th >Lab No.</th><th >System</th><th >Roll No.</th><th >Sdrn</th><th >Problem</th><th >Date</th></tr>";

        foreach($complaint as $a){
            $data .= "<tr style='text-align:center;'>";
            $data .= "<td >".$a->comp_no."</td>"; 
            $data .= "<td >".$a->labno."</td>";
            $data .= "<td >".$a->sysno."</td>";
            if($a->rollno == 'NULL')
                $data .= "<td > - </td>";
            else
                $data .= "<td >".$a->rollno."</td>";
            $data .= "<td >".$a->sdrn."</td>";
            $data .= "<td >".$a->problem."</td>";
            $data .= "<td >".date('d M Y', strtotime($a->created_at))."</td>";
            $data .= "</tr>";
        }
        $data .= "</table>";

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($data);
        return $pdf->stream();
    }


    public function index(Request $request)
    {
    	$borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)",
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)"
        ];

        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)",
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)"
        ];

        $borderColor_1 = "rgba(51,105,232, 1.0)";   //blue
        $borderColor_2 = "rgba(244,67,54, 1.0)";    //red

        $fillColor_1 = "rgba(51,105,232, 0.2)";
        $fillColor_2 = "rgba(244,67,54, 0.2)";

        $count = [];
        $count_up = [];
        $month_word = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $graph = $request->input('graph');
        $year = $request->input('year');
        $month = $request->input('month');
        $type = $request->input('type');
        $p_floor = $request->input('p_floor');
        $lab = $request->input('lab');

        if($p_floor=='')
            $floor = $request->session()->get('floor');
        else
            $floor = $p_floor;

        if($graph==1)
        {
            $complaint=DB::table('complaints')
            ->get(['created_at']);

            $years = []; 
            for($i=0; $i<$complaint->count(); $i++){
                $timestamp = strtotime($complaint[$i]->created_at);
                array_push($years, date('Y', $timestamp)); 
            }

            $collection = collect($years);
            $unique = $collection->unique();
            $unique  =  $unique->values()->all();
            sort($unique);
        
            if($floor!=7){
                for($i=0; $i<count($unique); $i++){
                    $count[$i] = DB::table('complaints')
                            ->where(['floor'=>$floor])
                            ->whereYear('created_at', $unique[$i])
                            ->count();
                }
            }
            else{
                for($i=0; $i<count($unique); $i++){
                    $count[$i] = DB::table('complaints')
                            ->whereYear('created_at', $unique[$i])
                            ->count();
                }
            }

            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.5)
                        ->title('Total no. of complaints', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            if($type=='line' || $type=='bar')
                $usersChart->displayLegend($legend=false);

            $usersChart->labels($unique);
            $usersChart->dataset('No of Complaints', $type, $count)
                ->color($borderColors)
                ->backgroundcolor($fillColors);
        }
        else if($graph==2)
        {
            $count = [0,0,0,0,0,0,0,0,0,0,0,0];
            $count_up = [0,0,0,0,0,0,0,0,0,0,0,0];
            
            if($floor!=7){
                for($i=1; $i<=12; $i++){
                    $count[$i-1] = DB::table('complaints')
                                    ->where(['floor'=>$floor, 'status'=>3])
                                    ->whereYear('created_at', $year)
                                    ->whereMonth('created_at', $i)
                                    ->count();

                    $count_up[$i-1] = DB::table('complaints')
                                    ->where(['floor'=>$floor])
                                    ->whereIn('status', [1, 2])
                                    ->whereYear('created_at', $year)
                                    ->whereMonth('created_at', $i)
                                    ->count();
                }
            }
            else{
                for($i=1; $i<=12; $i++){
                    $count[$i-1] = DB::table('complaints')
                                    ->where(['status'=>3])
                                    ->whereYear('created_at', $year)
                                    ->whereMonth('created_at', $i)
                                    ->count();

                    $count_up[$i-1] = DB::table('complaints')
                                    ->whereIn('status', [1, 2])
                                    ->whereYear('created_at', $year)
                                    ->whereMonth('created_at', $i)
                                    ->count();
                }
            }
            
            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.8)
                        ->title('Total no. of complaints', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            if($type=='pie' || $type=='doughnut')
                $usersChart->displayLegend($legend=false);

            $usersChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
            
            $usersChart->dataset('Underprocess', $type, $count_up)
                ->color($borderColor_2)
                ->backgroundcolor($fillColor_2);

            $usersChart->dataset('Resolved', $type, $count)
                ->color($borderColor_1)
                ->backgroundcolor($fillColor_1);
        }
        else if($graph==3)
        {
            if($floor!=7){
                $complaint=DB::table('complaints')
                    ->where(['floor'=>$floor])
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)->get();
            }
            else{
                $complaint=DB::table('complaints')
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)->get();
            }
            
            $pending = 0;
            $done = 0;

            for($i=0; $i<$complaint->count(); $i++){
                if($complaint[$i]->status == 3)
                    $done += 1;
                else
                    $pending += 1; 
            }

            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.5)
                        ->displayLegend($legend=true)
                        ->title('Total no. of complaints', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            $usersChart->labels(['Underprocess', 'Completed']);
            $usersChart->dataset('No of Complaints', $type, [$pending, $done])
                        ->color([$borderColor_2, $borderColor_1])
                        ->backgroundcolor([$fillColor_2, $fillColor_1]);
        }
        else if($graph==4)
        {
            $labs=DB::table('floor_lab')
            ->where(['floor'=>$floor])->get();

            $unique = []; 
            for($i=0; $i<$labs->count(); $i++){

                array_push($unique, $labs[$i]->labno); 
            }
            sort($unique);

            for($i=0; $i<count($unique); $i++){
                $count[$i] = DB::table('complaints')
                        ->where(['floor'=>$floor, 'labno'=>$unique[$i], 'status'=>3])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->count();

                $count_up[$i] = DB::table('complaints')
                        ->where(['floor'=>$floor, 'labno'=>$unique[$i]])
                        ->whereIn('status', [1, 2])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->count();
            }
                       
            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.9)
                        ->title('Total no. of complaints per Lab', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            if($type=='pie' || $type=='doughnut')
                $usersChart->displayLegend($legend=false);

            $usersChart->labels($unique);

            $usersChart->dataset('Underprocess Complaints', $type, $count_up)
                    ->color($borderColor_2)
                    ->backgroundcolor($fillColor_2);
                
            $usersChart->dataset('Resolved Complaints', $type, $count)
                    ->color($borderColor_1)
                    ->backgroundcolor($fillColor_1);
        }
        else if($graph==5)
        {
            $complaint=DB::table('complaints')
            ->where(['labno'=>$lab])
            ->get(['problem']);

            $issues = []; 
            for($i=0; $i<$complaint->count(); $i++){
                array_push($issues, $complaint[$i]->problem); 
            }

            $collection = collect($issues);
            $unique = $collection->unique();
            $unique  =  $unique->values()->all();
            sort($unique);
        
            for($i=0; $i<count($unique); $i++){
                $count[$i] = DB::table('complaints')
                        ->where(['floor'=>$floor, 'labno'=>$lab, 'status'=>3])
                        ->where ( 'problem', 'LIKE', '%' . $unique[$i] . '%' )
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->count();

                $count_up[$i] = DB::table('complaints')
                        ->where(['floor'=>$floor, 'labno'=>$lab])
                        ->where ( 'problem', 'LIKE', '%' . $unique[$i] . '%' )
                        ->whereIn('status', [1, 2])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->count();
            }

            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.7)
                        ->title('Total no. of complaints', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            if($type=='pie' || $type=='doughnut')
                $usersChart->displayLegend($legend=false);

            $usersChart->labels($unique);

            $usersChart->dataset('Underprocess', $type, $count_up)
                    ->color($borderColor_2)
                    ->backgroundcolor($fillColor_2);
                
            $usersChart->dataset('Resolved', $type, $count)
                    ->color($borderColor_1)
                    ->backgroundcolor($fillColor_1);
        }

        return view('chart')->with('chart', $usersChart)->with('graph', $graph)->with('type', $type)
                            ->with('year', $year)->with('month', $month)->with('month_word', $month_word)
                            ->with('p_floor', $p_floor);
            
    }
}