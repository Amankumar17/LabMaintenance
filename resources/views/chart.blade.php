<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    </head>
    <body>

        <!-- Main Application -->
        
        <div class="container" style="margin-top:40px;">
            <h1>Users Graphs</h1>
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
        <form action="/chart_options">
        <button class="btn btn-default" style="width:16%;">Back</button>
        </form>
        </center>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    </body>
</html>
