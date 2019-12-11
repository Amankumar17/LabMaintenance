<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    </head>
    <body>

        <center>
        @if($graph==1)
            <h3>Year Wise Chart for Total no. of Complaints </h3>
        @endif
        @if($graph==2)
            <h3>Month Wise Chart for Total no. of Complaints <br>
            In the Year {{$year}}</h3>
        @endif
        @if($graph==3)
            <h3>Chart for Total no. of Complaints <br>
            In The Year {{$year}} and Month {{$month}}</h3>
        @endif
        @if($graph==4)
            <h3>Lab Wise Chart for Total no. of Complaints <br>
            In The Year {{$year}} and Month {{$month}}</h3>
        @endif
        <h3>Chart Type: {{$type}} Chart</h3>
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
        <!-- <form action="/chart_options"> -->
        <button class="btn btn-default" onclick="window.location.href = '/chart_options';" style="width:16%;">Back</button>
        <!-- </form> -->
        </center>
        <br><br>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    </body>
</html>
