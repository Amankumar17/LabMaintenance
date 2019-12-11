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


    public function displayReport(PDF $pdfCreator, Request $request)
    {
        // $pdf = App::make('dompdf.wrapper');

        $floor = $request->session()->get('floor');

        $complaint=DB::table('complaints')
                ->where(['floor'=>$floor])
                ->get();
        // echo $complaint;
        // echo "<br>";

        // $data = [];
        // for($i=0; $i<$complaint->count(); $i++){
        //     array_push($data, $complaint[$i]);
        //           }
        // print_r($data);
        // $pdf->loadHTML($data);
        // return $pdf->stream();


        // $pdf = PDF::loadView('report_option', compact('complaint'));
  
        $pdf = $pdfCreator->loadView('report_option', compact('complaint'));
        return $pdf->download('itsolutionstuff.pdf');




        // $pdf->loadHTML($data);
        // return $pdf->stream();


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
            "rgba(205,220,57, 1.0)"
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
            "rgba(205,220,57, 0.2)"

        ];

        $floor = $request->session()->get('floor');

        $arr_month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $graph = $request->input('graph');
        // echo $graph;
        $year = $request->input('year');
        // echo $year;
        $month = $request->input('month');
        // echo $month;
        $type = $request->input('type');
        // echo $type;

        if($graph==1)
        {
            $complaint=DB::table('complaints')
                ->where(['floor'=>$floor])
                ->get(['created_at']);

            // echo $complaint;

            $years = []; 
            for($i=0; $i<$complaint->count(); $i++){

                $timestamp = strtotime($complaint[$i]->created_at);
                array_push($years, date('Y', $timestamp)); 
            }
            // foreach($years as $value){
            //     echo "Salary: $value<br>";
            //   }
            // print_r($years);


            $collection = collect($years);
            $unique = $collection->unique();
            $unique  =  $unique->values()->all();
            sort($unique);

            
            // print_r($unique);
            // $count = [];
            // for($i=0; $i<count($unique); $i++){
            //     array_push($count, 0);
            // }
            // print_r($count);
           
            
            for($i=0; $i<count($unique); $i++){

                    $count[$i] = DB::table('complaints')
                            ->where(['floor'=>$floor])
                            ->whereYear('created_at', $unique[$i])
                            ->count();
            }

            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.5)
                        ->displayLegend($legend=false)
                        ->title('Total no. of complaints', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            $usersChart->labels($unique);
            $usersChart->dataset('No of Complaints', $type, $count)
                ->color($borderColors)
                ->backgroundcolor($fillColors);


            // return view('chart', [ 'chart' => $usersChart ] );

        }
        else if($graph==2)
        {
            $count = [0,0,0,0,0,0,0,0,0,0,0,0];
            
            for($i=1; $i<=12; $i++){
            $count[$i-1] = DB::table('complaints')
                            ->where(['floor'=>$floor])
                            ->whereYear('created_at', $year)
                            ->whereMonth('created_at', $i)
                            ->count();
            }
            // for($i=0; $i<$complaint->count(); $i++){
            //     $timestamp = strtotime($complaint[$i]->created_at);
            //     if(date('m', $timestamp) == 1)
            //         $count[0] += 1;
            //     else if(date('m', $timestamp) == 10)
            //         $count[9] += 1;

            // }
            // print_r($count);

            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.5)
                        ->displayLegend($legend=false)
                        ->title('Total no. of complaints', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            $usersChart->labels($arr_month);
            $usersChart->dataset('No of Complaints', $type, $count)
                ->color($borderColors)
                ->backgroundcolor($fillColors);


            // return view('chart', [ 'chart' => $usersChart ] );

            // return view('login');
        }
        else if($graph==3)
        {
            $complaint=DB::table('complaints')
            ->where(['floor'=>$floor])
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)->get();

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
                        ->displayLegend($legend=false)
                        ->title('Total no. of complaints', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            $usersChart->labels(['Underprocess', 'Completed']);
            $usersChart->dataset('No of Complaints', $type, [$pending, $done])
                        ->color($borderColors)
                        ->backgroundcolor($fillColors);


            // return view('chart', [ 'chart' => $usersChart ] );
        }
        else if($graph==4)
        {
            $labs=DB::table('floor_lab')
            ->where(['floor'=>$floor])->get();

            // echo $labs;

            $unique = []; 
            for($i=0; $i<$labs->count(); $i++){

                array_push($unique, $labs[$i]->labno); 
            }
            // print_r($unique);
            sort($unique);

            for($i=0; $i<count($unique); $i++){

                $count[$i] = DB::table('complaints')
                        ->where(['floor'=>$floor, 'labno'=>$unique[$i]])
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->count();
        }

            // print_r($count);

            $usersChart = new UserChart;
            $usersChart->minimalist(false)
                        ->barWidth(0.5)
                        ->displayLegend($legend=false)
                        ->title('Total no. of complaints per Lab', 20, '#666', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
            
            $usersChart->labels($unique);
            $usersChart->dataset('No of Complaints', $type, $count)
                ->color($borderColors)
                ->backgroundcolor($fillColors);


            // return view('chart', [ 'chart' => $usersChart ] );
        }
        // echo $year;
        return view('chart')->with('arr_month', $arr_month)->with('chart', $usersChart)->with('graph', $graph)->with('type', $type)->with('year', $year)->with('month', $month);
        
    }

    // public function index2(Request $request)
    // {
    // 	$borderColors = [
    //         "rgba(255, 99, 132, 1.0)",
    //         "rgba(22,160,133, 1.0)",
    //         "rgba(255, 205, 86, 1.0)",
    //         "rgba(51,105,232, 1.0)",
    //         "rgba(244,67,54, 1.0)",
    //         "rgba(34,198,246, 1.0)",
    //         "rgba(153, 102, 255, 1.0)",
    //         "rgba(255, 159, 64, 1.0)",
    //         "rgba(233,30,99, 1.0)",
    //         "rgba(205,220,57, 1.0)"
    //     ];
    //     $fillColors = [
    //         "rgba(255, 99, 132, 0.2)",
    //         "rgba(22,160,133, 0.2)",
    //         "rgba(255, 205, 86, 0.2)",
    //         "rgba(51,105,232, 0.2)",
    //         "rgba(244,67,54, 0.2)",
    //         "rgba(34,198,246, 0.2)",
    //         "rgba(153, 102, 255, 0.2)",
    //         "rgba(255, 159, 64, 0.2)",
    //         "rgba(233,30,99, 0.2)",
    //         "rgba(205,220,57, 0.2)"

    //     ];

    //     $floor = $request->session()->get('floor');

    //     $year = $request->input('year');
    //     echo $year;
    //     $month = $request->input('month');
    //     echo $month;
    //     $type = $request->input('type');
    //     echo $type
    //     ;
    //     // $complaint=DB::table('complaints')->where(['floor'=>$floor])->get();
    //     $complaint=DB::table('complaints')
    //         ->where(['floor'=>$floor])
    //         ->whereYear('created_at', $year)
    //         ->whereMonth('created_at', $month)->get();

    //     // echo $complaint;

    //     $usersChart = new UserChart;
    //     $usersChart->minimalist(false);

    //     // $a = [];
    //     // for($i=0; $i<$complaint->count(); $i++){
    //     //     array_push($a, $complaint[$i]->status);
    //     // }
    //     // print_r($a);

    //     $pending = 0;
    //     $done = 0;

    //     for($i=0; $i<$complaint->count(); $i++){
    //         if($complaint[$i]->status == 3)
    //             $done += 1;
    //         else
    //             $pending += 1; 
    //     }
    //     // $done=DB::table('complaints')->where(['floor'=>$floor, 'status'=>3])->count();

    //     // echo $pending, $done;

    //     $usersChart->labels(['Pending', 'Completed']);
    //     $usersChart->dataset('No of Complaints', $type, [$pending, $done])
    //         ->color(['lightgreen', 'lightblue'])
    //         ->backgroundcolor(['lightgreen', 'lightblue']);


    //     return view('chart', [ 'chart' => $usersChart ] );

    //     // return view('login');
    // }

}
