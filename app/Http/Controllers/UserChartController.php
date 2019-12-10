<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;
use App\Charts\UserChart;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $complaint=DB::table('complaints')->where(['floor'=>$floor])->get();

        $usersChart = new UserChart;
        $usersChart->minimalist(false);

        // $a = [];
        // for($i=0; $i<$complaint->count(); $i++){
        //     array_push($a, $complaint[$i]->status);
        // }
        // print_r($a);
        $pending = 0;
        $done = 0;

        for($i=0; $i<$complaint->count(); $i++){
            if($complaint[$i]->status == 3)
                $done += 1;
            else
                $pending += 1; 
        }

        // echo $pending, $done;

        $usersChart->labels(['Pending', 'Completed']);
        $usersChart->dataset('No of Complaints', 'doughnut', [$pending, $done])
            ->color(['lightgreen', 'lightblue'])
            ->backgroundcolor(['lightgreen', 'lightblue']);


        return view('chart', [ 'chart' => $usersChart ] );
    }

}
