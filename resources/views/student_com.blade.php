<html>
    <head>
        <title>Student Complaint</title>
    </head>
    <style>
        .box{
	width: 50%;
	min-height: 300px;
	height: auto;
            background: #fefefe;
	    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin:2% 4%;
            padding: 3% 0;
        }
        input[type="text"], select{
            padding:0 5%;
            outline: none;
            width:33%;
            text-decoration: none;
            border:none;
            border-bottom:1px solid #333; 
        }

        label{
            padding:0 8%;
		font-size: 18px;
        }
        .b1{
            background-color: green;
		width: 45%;
            color: white;
            border:none;
            text-decoration: none;
            border-radius: 2px;
            padding: 1.5% 5%;
        }

	h3 {
	font-size: 25px;
	font-family: century gothic;
	}

    </style>


    <body>

        <center>
            <br>
            <h3>Student Complaint</h3>
        <div class="box">
        <label>Student:</label><input type="text" placeholder="Student Name" class="in">
        <br><br><br>
        <label>Faculty:</label><input type="text" placeholder="Faculty Name" class="in">
        <br><br><br>
        <label>Lab No:</label>
        <select class="in" id="lb" name="op" onchange="labsys(this.value)">
            <option value="" disabled selected>Select</option>
            @for($i=0;$i<$lab->count();$i++)
                <option >{{$lab[$i]->labno}}</option>
            @endfor
        </select>
        <br><br><br>
        <label >System:</label>
            <select class="in" id="syst">
                
                <option value="" disabled selected>Select</option>
                
            </select>
        <br><br><br>
        <button type="submit" onclick="myFunction()" class="b1">Show Previous Complaints</button>
              <br><br><br>
              <p id="demo"></p>
              <a href="filecomplaint"><button id="b2" style="width:45%; padding:1% 5%;" disabled>Add New Complaint</button></a>
        </div>
        </center>
        <script>
        function labsys(value)
        {
            //console.log(value);
            if (value.length==0)
            {
                document.getElementById("syst").innerHTML = '<option value="" disabled selected>Select</option>';
            }
            else
            {
                 var obj = <?php echo json_encode($systems); ?>;
                 var arr=[];
                // var obj =
                //console.log(obj); 
                for(a in obj)
                {
                    arr.push(obj[a])
                }
                // arr.sort(function(a,b){return a[1] - b[1]});
                // arr.reverse();
                var cont='<option value="" disabled selected>Select</option>';
                //console.log(arr.sort());
                //arr.sort(function(a, b){return a - b});
                //console.log(arr.(1.toString()).labno);
                for(i=0;i<arr.length;i++)
                {
                    if(arr[i].labno==value)
                    {
                        cont = cont + "<option>" + arr[i].sys + "</option>";
                    }
                }
                document.getElementById('syst').innerHTML = cont;
            }
            return 0;
        }
    function getVal()
    {
    var a = document.getElementById('lb').value;
    return a;
    }
    </script>
        <script>
                function myFunction() {
                  document.getElementById("demo").innerHTML = "Data";
		document.getElementById("b2").disabled = false;
		var element = document.getElementById("b2");
   		element.classList.add("b1");
                    }

        
    
                
        </script>
                
    </body>


</html>