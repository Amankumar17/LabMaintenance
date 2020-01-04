<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    </head>
    <style>
    .title {
        font-family: cursive;
        margin: 30px;
    }
    </style>
    <body>

        <center>
        <div class='title'>
        @if($graph==1)
            <h3>Year Wise Chart for Total no. of Complaints </h3>
        @endif
        @if($graph==2)
            <h3>Month Wise Chart for Total no. of Complaints <br>
            In the Year {{$year}}</h3>
        @endif
        @if($graph==3)
            @for($i=0; $i<'12'; $i++)
            @if($month == $i+1)
            <h3>Month Chart for Total no. of Complaints <br>
            In The Year {{$year}} and Month {{$month_word[$i]}}</h3>
            @endif
            @endfor
        @endif
        @if($graph==4)
            @for($i=0; $i<'12'; $i++)
            @if($month == $i+1)
            <h3>Lab Wise Chart for Total no. of Complaints <br>
            In The Year {{$year}} and Month {{$month_word[$i]}}</h3>
            @endif
            @endfor
        @endif
        @if($graph==5)
            @for($i=0; $i<'12'; $i++)
            @if($month == $i+1)
            <h3>Issue Wise Chart for Total no. of Complaints <br>
            In The Year {{$year}} and Month {{$month_word[$i]}}</h3>
            @endif
            @endfor
        @endif
        <h3>Chart type: {{$type}} chart</h3>
        </div>
        </center>

        <!-- Main Application -->
        <div class="container" style="margin-top:40px;">
            <!-- <h1></h1> -->

            <div class="row">
                <div class="col-6">
                    <div class="card rounded">
                        <div class="card-body py-3 px-3">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Of Main Application -->

        <br><br>
        <center>
        <button class="btn btn-default" onclick="window.location.href = '/chart_options';" style="width:16%;">Back</button>
        </center>
        <br><br>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    </body>
</html>
