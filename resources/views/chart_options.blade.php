<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

        <link rel="stylesheet" href="css/hod_options.css">
        <title>Chart Generation</title>
    </head>
    <style>
        /* HIDE RADIO */
        .chart [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* IMAGE STYLES */
        .chart [type=radio] + img {
        cursor: pointer;
        }

        /* CHECKED STYLES */
        .chart [type=radio]:checked + img {
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.5);
        
        }

        .chart img {
            width:190px;
            height: 130px;
        }

        .chart label {
            margin: 1% 1.5%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .chart img:hover {
            box-shadow: 0 2px 12px 0 rgba(200, 200, 200, 0.9);
        }

		@media screen and (min-width: 650px) {
			.forms {
			margin: 2% 10% 2% 10%;
			}
		}

    </style>
    <body>
        <center>

        <br>
		<p>Please select the necessary details to generate the Chart</p>

		<div class='forms'>
            <form action="/chart" method="POST">

                <div class='chart box'>
                    <h4>Select the chart type</h4>
                    <label>
                    <input type="radio" name="type" value="line" checked>
                    <img src="https://cms-assets.tutsplus.com/uploads/users/48/posts/28129/final_image/Chart.png">
                    </label>

                    <label>
                    <input type="radio" name="type" value="bar">
                    <img src="https://i.stack.imgur.com/g3hai.png">
                    </label>

                    <label>
                    <input type="radio" name="type" value="pie">
                    <img src="https://i.stack.imgur.com/Vp3FV.png">
                    </label>

                    <label>
                    <input type="radio" name="type" value="doughnut">
                    <img src="https://aws1.discourse-cdn.com/ionicframework/original/3X/2/b/2b0cba97b8024ea5c421490ecbb532c025bb70a9.jpg">
                    </label>
                </div>

                <br>

                <div class='box'>
                    <h4>Select the x-axis</h4>
                    <select name="graph" onchange="function1(this.value)" required>
                        <option value="" disabled selected>Select</option>
                        <option value="1">Year Wise</option>
                        <option value="2">Month Wise</option>
                        <option value="3">Any One Month</option>
                        <option value="4">Lab Wise</option>
                    </select>
                </div>

                <br>

                <div id="b1" class='box' style="display:none;">
                    <h4>Select Year</h4>
                    <select name="year" id="y">
                        <option value="" disabled selected>Select</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>

                <br>

                <div id="b2" class='box'style="display:none;">
                    <h4>Select Month</h4>
                    <select name="month" id="m"  >
                        <option value="" disabled selected>Select</option>
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                </div>

                <br>

                <input class="btn btn-success" type="submit" value="Generate">
            </form>
        </div>
                
        <button class="btn btn-primary" onclick="window.location.href = '/hod_home';">Back</button>
        </center>
        <br><br><br>

        <script>
            function function1(value)
            {
                if (value.length==0) {
                    //
                }
                else {
                    if(value==1) {
                        document.getElementById("b1").style.display = "none";
                        document.getElementById("y").required = false;

                        document.getElementById("b2").style.display = "none";
                        document.getElementById("m").required = false;
                    }
                    if(value==2) {
                        document.getElementById("b1").style.display = "block";
                        document.getElementById("y").required = true;

                        document.getElementById("b2").style.display = "none";
                        document.getElementById("m").required = false;
                    }
                    else if(value==3 || value==4) {

                        document.getElementById("b1").style.display = "block";
                        document.getElementById("y").required = true;

                        document.getElementById("b2").style.display = "block";
                        document.getElementById("m").required = true;
                    }
                }
                return 0;
            }
        </script>

    </body>
</html>