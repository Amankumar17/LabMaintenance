<html>
    <head>
        <title>Student Complaint</title>
        <link rel="stylesheet" href="css/headerstyle.css">
        <link rel="stylesheet" href="css/footerstyle.css">
    </head>
    <style>

    body {
        font-family: courier new;
    }

    .header {
        width: 99%;
        margin: 0 0 0 0;
    }
    
    .header a.active {
	    background-color: rgb(41, 139, 44);
	    color: white;
    }
    
    .box {
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
        width:35%;
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
    
    p.complaints{
        display:none;
    }

    table{
  width: 100%;
  font-family: century gothic;
  border-collapse: collapse;
  
}

th{
  text-align:center;
  border: 1px solid #dddddd;
} 
td{
  border: 1px solid #dddddd;
  text-align:center;

}
tr:nth-child(even) {
  background-color: #dddddd;
}

    </style>

    <body>
    <div class="header" id="myHeader">
        <a  href="/student">&#x26F7; Home</a>
		<a class="active" href="">New Complaint</a>
		<a href="/login">Logout</a>
	</div>
        <center>
            <br>
            <h3>Student's Complaint</h3>
        <div class="box">
        <form action="/filecomplaint">
        <label>Student:</label><input type="text" class="in" name="stud_name" value='{{$stud_details[0]->First_name}} {{$stud_details[0]->Middle_name}} {{$stud_details[0]->Last_name}}'>
        <br><br><br>
        <label>Sdrn:</label><input type="text" name='sdrn' class="in">
        <br><br><br>

        <label>Roll no:</label><input type="text" class="in" name="rollno" value='{{$stud_details[0]->Roll_no}}'>
        <br><br><br>

        <label>Lab No:</label>    
        <select class="in" id="lb" name="op" onchange="labsys(this.value)" required>
            <option value="" disabled selected>Select</option>
            @for($i=0; $i<$lab->count(); $i++)
                <option >{{$lab[$i]->labno}}</option>
            @endfor
        </select>
    
        <br><br><br>

        <label >System:</label>
            <select class="in" id="syst" name="system" required>
                
                <option value="" disabled selected>Select</option>
                
            </select>

        <br><br><br>
        
        
        
         
        
              <br><br><br>
              
              <div id="pctb" class="complaints"></div>

            
              <input type="submit" id="b2" style="width:45%; padding:1% 5%;" disabled value="Add New Complaint">
        </form>
        <button onclick="showComplaints()" class="b1">Show Previous Complaints</button>
        </div>
        </center>

        <script>

        function labsys(value)
        {
            //console.log(value);
            if (value.length==0) {
                document.getElementById("syst").innerHTML = '<option value="" disabled selected>Select</option>';
            }
            else {
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
                for(i=0; i<arr.length; i++)
                {
                    if(arr[i].labno == value)
                    {
                        cont = cont + "<option>" + arr[i].sys + "</option>";
                    }
                }
                document.getElementById('syst').innerHTML = cont;
            }
            return 0;
        }

        </script>

        <script>
            function showComplaints() {
            var labn = document.getElementById("lb").value;
            var syt = document.getElementById("syst").value;
            //console.log(labn,syt);
            document.getElementById("b2").disabled = false;
            var obj = <?php echo json_encode($complaint); ?>;
                 var arr=[];
                // var obj =
                //console.log(obj); 
                for(a in obj)
                {
                    arr.push(obj[a])
                }
                //console.log(arr);
                // arr.sort(function(a,b){return a[1] - b[1]});
                // arr.reverse();
                var cont='<table><th>Complaint No.</th><th>Lab no.</th><th>System no.</th><th>Complaint</th>';
                //console.log(arr.sort());
                //arr.sort(function(a, b){return a - b});
                //console.log(arr.(1.toString()).labno);
                for(i=0; i<arr.length; i++)
                {
                    if(arr[i].labno == labn && arr[i].sysno == syt)
                    {
                        // console.log(arr[i].comp_no);
                        cont = cont + "<tr><td>" + arr[i].comp_no + "</td>"+"<td>"+arr[i].labno+"</td>"+"<td>"+arr[i].sysno+"</td>"+"<td>"+arr[i].description+"</td></tr>";
                    }
                }
                cont = cont + "</table><br><br>";
                console.log(cont);
                document.getElementById('pctb').innerHTML = cont;
            
}
        </script>
    
    <!-- FOOTER START -->
    <div class="footer" style="margin-top:5%;">
    <br>Site by<br>
    Amankumar Shrivastava,
    Saurabh Varade,
    Siddhi Jagtap,
    Rasika Deshmukh
    <br><br><br>
    Copyright © 2019 Ramrao Adik Institute of Technology
    </div>
    <!-- END OF FOOTER -->

    </body>

</html>