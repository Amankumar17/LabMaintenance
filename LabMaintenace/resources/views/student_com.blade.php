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
        <select class="in" id="lb" name="op" val="">
            @for($i=0;$i<$lab->count();$i++)
                <option value="">{{$lab[$i]->labno}}</option>
            @endfor
        </select>
        <br><br><br>
        <label >System:</label>
            <select class="in">
                @for($i=0;$i<$systems->count();$i++)
                
                    @if($systems[$i]->labno==getVal())
                        <option value="">{{$systems[$i]->sys}}
                    @endif
                @endfor
                <option value="1"></option>
                
            </select>
        <br><br><br>
        <button type="submit" onclick="myFunction()" class="b1">Show Previous Complaints</button>
              <br><br><br>
              <p id="demo"></p>
              <a href="filecomplaint"><button id="b2" style="width:45%; padding:1% 5%;" disabled>Add New Complaint</button></a>
        </div>
        </center>
        <script>
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