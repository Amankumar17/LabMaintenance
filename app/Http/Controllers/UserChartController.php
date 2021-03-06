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
        $data .="<table style='width:75%''><tr><td><img src='img/dypatil-logo.png' width='200' height='70' alt='DY Patil Logo' ></td>";
        $data .= "<td><h1>Lab Maintenance</h1></td></tr></table>";
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

    public function displayRegistry(Request $request)
    {
        // $floor = $request->session()->get('floor');

        $deadstock=DB::table('deadstock')
            ->get();

        $data ="<head><title>Deadstock Registry</title></head>";
        $data .= "<style>
                    table{font-family: 'Times New Roman', Times, serif;
                    }
                    th{color:black;text-align:center;
                        padding:2px;
                        padding-top: 8px;
                        padding-bottom: 12px;
                        font-size:14px;
                        
                    }
                
                    tr:nth-child(even){background-color: #f2f2f2;}
                    td{padding: 6px;font-size:13px;
                        }
                    
                    </style>";
        $data .="<table style='width:75%''><tr><td><img src='img/dypatil-logo.png' width='200' height='70' alt='DY Patil Logo' ></td>";
        $data .= "<td><h1>Lab Maintenance</h1></td></tr></table>";
        $data .= "<center style='color:black;margin-top:0px;'><h2>Deadstock Registry</h2></center><br><hr><br>";
        
        $data .= "<table style='border-collapse: collapse;width:100%;'><tr><th>Sr.</th><th>Date</th><th>Name of Item</th><th>Description</th><th>Warranty</th><th>Quantity</th><th>Amount</th><th>GPR Refno</th><th>Supplier</th><th>Bill no</th><th>Purchase Date</th><th>Disposal</th><th>Remarks</th></tr>";

        foreach($deadstock as $a){
            $data .= "<tr style='text-align:center;'>";
            $data .= "<td >".$a->Srno."</td>";
            $data .= "<td >".date('d M Y', strtotime($a->Date))."</td>";
            $data .= "<td >".$a->Name_of_Item."</td>";
            // if($a-> == 'NULL')
            //     $data .= "<td > - </td>";
            // else{
                $data .= "<td >".$a->Description."</td>";
                $data .= "<td >".$a->Warranty."</td>";
                $data .= "<td >".$a->Quantity."</td>";
                $data .= "<td >".$a->Amount."</td>";
                $data .= "<td >".$a->GPR_Refno."</td>";
                $data .= "<td >".$a->Supplier."</td>";
                $data .= "<td >".$a->Billno."</td>";
                $data .= "<td >".date('d M Y', strtotime($a->Purchase_Date))."</td>";
                $data .= "<td >".$a->Disposal."</td>";
                $data .= "<td >".$a->Remarks."</td>";
            // }
            $data .= "</tr>";
        }
        $data .= "</table>";

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($data);
        return $pdf->stream();
    }

    // public function downloadChart(Request $request)
    // {
    //     $data = '<head>
    //             <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    //         </head>
    //         <body>
    //             <!-- Main Application -->
    //             <div class="container" style="margin-top:40px;">
    //                 <div class="row">
    //                     <div class="col-6">
    //                         <div class="card rounded">
    //                             <div class="card-body py-3 px-3">
    //                                 .$chart->container().
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //             <!-- End Of Main Application -->
        
    //             <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    //             .$chart->script().
    //         </body>
    //     </html>
    //     ';

    //     $pdf = App::make('dompdf.wrapper');
    //     $pdf->loadHTML($data);
    //     return $pdf->stream();
    // }

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
        
            $a = [];
            if($floor!=7){
                for($i=0; $i<count($unique); $i++){
                    $count[$i] = 0;

                    $rows = DB::table('complaints')
                            ->where(['floor'=>$floor])
                            ->whereYear('created_at', $unique[$i])
                            ->get(['sysno']);

                    for($k=0; $k<$rows->count(); $k++){
                        if(strpos($rows[$k]->sysno, ',')) {
                            $a = explode(',', $rows[$k]->sysno);
                            $count[$i] += count($a);
                        }
                        else
                            $count[$i] += 1;
                    }       
                }
            }
            else{
                for($i=0; $i<count($unique); $i++){
                    $count[$i] = 0;

                    $rows = DB::table('complaints')
                            ->whereYear('created_at', $unique[$i])
                            ->get(['sysno']);

                            for($k=0; $k<$rows->count(); $k++){
                                if(strpos($rows[$k]->sysno, ',')) {
                                    $a = explode(',', $rows[$k]->sysno);
                                    $count[$i] += count($a);
                                }
                        else
                            $count[$i] += 1;
                    }       
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
                $a = [];
                for($i=1; $i<=12; $i++){
                    $count[$i-1] = 0;
                    $count_up[$i-1] = 0;

                    $rows = DB::table('complaints')
                                ->where(['floor'=>$floor])
                                ->whereIn('status', [1, 2, 3])
                                ->whereYear('created_at', $year)
                                ->whereMonth('created_at', $i)
                                ->get(['sysno', 'status']);

                    for($k=0; $k<$rows->count(); $k++){
                        if(strpos($rows[$k]->sysno, ',')) {
                            $a = explode(',', $rows[$k]->sysno);
                            if($rows[$k]->status == 3)
                                $count[$i-1] += count($a);
                            else
                                $count_up[$i-1] += count($a);
                        }
                        else{
                            if($rows[$k]->status == 3)
                                $count[$i-1] += 1;
                            else
                                $count_up[$i-1] += 1;
                        }
                    }
                }
            }
            else{
                $a = [];
                for($i=1; $i<=12; $i++){
                    $count[$i-1] = 0;
                    $count_up[$i-1] = 0;

                    $rows = DB::table('complaints')
                                ->whereIn('status', [1, 2, 3])
                                ->whereYear('created_at', $year)
                                ->whereMonth('created_at', $i)
                                ->get(['sysno', 'status']);

                    for($k=0; $k<$rows->count(); $k++){
                        if(strpos($rows[$k]->sysno, ',')) {
                            $a = explode(',', $rows[$k]->sysno);
                            if($rows[$k]->status == 3)
                                $count[$i-1] += count($a);
                            else
                                $count_up[$i-1] += count($a);
                        }
                        else{
                            if($rows[$k]->status == 3)
                                $count[$i-1] += 1;
                            else
                                $count_up[$i-1] += 1;
                        }
                    }
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
                $rows = DB::table('complaints')
                        ->where(['floor'=>$floor])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->get(['sysno', 'status']);      
            }
            else{
                $rows = DB::table('complaints')
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)->get(['sysno', 'status']);
            }
            
            $pending = 0;
            $done = 0;

            for($k=0; $k<$rows->count(); $k++){
                if(strpos($rows[$k]->sysno, ',')) {
                    $a = explode(',', $rows[$k]->sysno);
                    if($rows[$k]->status == 3)
                        $done += count($a);
                    else
                        $pending += count($a);
                }
                else{
                    if($rows[$k]->status == 3)
                        $done += 1;
                    else
                        $pending += 1;
                }
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

            $a = [];
            for($i=0; $i<count($unique); $i++){
                $count[$i] = 0;
                $count_up[$i] = 0;

                $rows = DB::table('complaints')
                        ->where(['floor'=>$floor, 'labno'=>$unique[$i]])
                        ->whereIn('status', [1, 2, 3])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->get(['sysno', 'status']);

                for($k=0; $k<$rows->count(); $k++){
                    if(strpos($rows[$k]->sysno, ',')) {
                        $a = explode(',', $rows[$k]->sysno);
                        if($rows[$k]->status == 3)
                            $count[$i] += count($a);
                        else
                            $count_up[$i] += count($a);
                    }
                    else{
                        if($rows[$k]->status == 3)
                            $count[$i] += 1;
                        else
                            $count_up[$i] += 1;
                    }
                }
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
            $common_issues = DB::table('common_issues')
            ->where(['floor'=>$floor])
            ->get(['issue']);
            
            $unique = [];
            for($i=0; $i<$common_issues->count(); $i++){
                array_push($unique, $common_issues[$i]->issue);
            }

            $a = [];
            for($i=0; $i<count($unique); $i++){
                $count[$i] = 0;
                $count_up[$i] = 0;

                if($lab!='All'){
                $rows = DB::table('complaints')
                            ->where(['floor'=>$floor, 'labno'=>$lab])
                            ->where ( 'problem', 'LIKE', '%' . $unique[$i] . '%' )
                            ->whereIn('status', [1, 2, 3])
                            ->whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->get(['sysno', 'status']);
                }
                else{
                    $rows = DB::table('complaints')
                            ->where(['floor'=>$floor])
                            ->where ( 'problem', 'LIKE', '%' . $unique[$i] . '%' )
                            ->whereIn('status', [1, 2, 3])
                            ->whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->get(['sysno', 'status']);
                }

                for($k=0; $k<$rows->count(); $k++){
                    if(strpos($rows[$k]->sysno, ',')) {
                        $a = explode(',', $rows[$k]->sysno);
                        if($rows[$k]->status == 3)
                            $count[$i] += count($a);
                        else
                            $count_up[$i] += count($a);
                    }
                    else{
                        if($rows[$k]->status == 3)
                            $count[$i] += 1;
                        else
                            $count_up[$i] += 1;
                    }
                }
            }

            $count[$i] = 0;
            $count_up[$i] = 0;
            $b = [];

            if($lab!='All'){
                $rows = DB::table('complaints')
                        ->where(['floor'=>$floor, 'labno'=>$lab])
                        ->whereNotIn('problem', $unique)
                        ->whereIn('status', [1, 2, 3])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->get(['sysno', 'status', 'problem']);
            }
            else{
                $rows = DB::table('complaints')
                        ->where(['floor'=>$floor])
                        ->whereNotIn('problem', $unique)
                        ->whereIn('status', [1, 2, 3])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->get(['sysno', 'status', 'problem']);
            }
            
            for($k=0; $k<$rows->count(); $k++){

                $b = explode(',', $rows[$k]->problem);
                for($j=0; $j<count($b); $j++){
                    if (!in_array($b[$j], $unique)) {
                        if(strpos($rows[$k]->sysno, ',')) {
                            $a = explode(',', $rows[$k]->sysno);
                            if($rows[$k]->status == 3)
                                $count[$i] += count($a);
                            else
                                $count_up[$i] += count($a);
                        }
                        else{
                            if($rows[$k]->status == 3)
                                $count[$i] += 1;
                            else
                                $count_up[$i] += 1;
                        }
                    }
                }
            }
            array_push($unique, 'Others');

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