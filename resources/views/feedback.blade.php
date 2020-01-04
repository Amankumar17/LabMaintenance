<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <title>Student Complaint</title>
   <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/feedback.css">
   <link rel="stylesheet" href="css/student.css">
      
</head>
<body>

<!-- <h2 style=" font-size: 30px;position: absolute;top: 0;left: 61px;color: white;">
Welcome qwr</h2>  -->

<div class="contact-form">
   <div>
   
      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/feedback';"> Home</button>

      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/student_history';">History</button>

      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/testlogin';">Logout</button>

   </div>
   <br>
   

   <form action="/datasubmitted" method="POST">
      <div class="txtb">
         <label>Sdrn:</label>
         <input type="text" name='sdrn' class="in">
      </div>
      <div class="txtb">  
         <label>Select Floor</label>
         <select class="dropdown" id="lb" name="floor" onchange="floorlab(this.value)" required>
         <option value="" disabled selected>Select</option>
            @for($i=0; $i<$floors->count(); $i++)
                <option >{{$floors[$i]->floor}}</option>
            @endfor
         </select>
      </div>
      <div class="txtb">
         <label>Select the Lab</label>
         <select class="dropdown in" id="lab" name="lab" onchange="labsys(this.value)" required>
            <option value="" disabled selected>Select</option>
         </select>
      </div>

      <script>
         function floorlab(value)
         {
            if (value.length==0) {
                document.getElementById("lab").innerHTML = '<option value="" disabled selected>Select</option>';
            }
            else {
                 var obj = <?php echo json_encode($floor_lab); ?>;
                 var arr=[];
                  
                for(a in obj)
                {
                    arr.push(obj[a])
                }

                var cont='<option value="" disabled selected>Select</option>';
               //  console.log(value,arr);
                
                for(i=0; i<arr.length; i++)
                {
                   
                    if(arr[i].floor == value)
                    {
                        cont = cont + "<option>" + arr[i].labno + "</option>";
                    }
                }
                document.getElementById('lab').innerHTML = cont;
            }
            return 0;
        }
        function labsys(value) {
         if (value.length==0) {
                document.getElementById("pcno").innerHTML = '';
            }
            else {
                 var obj = <?php echo json_encode($systems); ?>;
                 var arr=[];
                  
                for(a in obj)
                {
                    arr.push(obj[a])
                }

                var cont='';
               //  console.log(value,arr);
                
                for(i=0; i<arr.length; i++)
                {
                   
                    if(arr[i].labno == value)
                    {
                        cont = cont + '<div><label><input type="checkbox" onclick="showComplaints()" id="sys" name="chk[]" value="' + arr[i].sys + '"><span>' + arr[i].sys + '</span></label></div>';
                    }
                }
                document.getElementById('pcno').innerHTML = cont;
                document.getElementById("pcgrid").style.display = "block";

            }
            return 0;
        }
      </script>

      <div id="pcgrid" style="display:none;">
         <label style="font-size:15px; margin-top:-10px; margin-bottom:-10px;" >Select PC Number</label>
         <div class="txtb container1" id='pcno'>
            <!-- @for ($i=0;$i<$systems->count();$i++)
               @if($systems[$i]->labno=='514')
                  <div>
                     <label>
                        <input type="checkbox" name="chk[]" value="PC-1-A"><span>{{$systems[$i]->sys}}</span>
                     </label>
                  </div>
               @endif
            @endfor -->
         </div>
      </div>	

      <div id="pctb" class="complaints"></div>
      <!-- <div id="pctb_nocomplaints" > </div> -->
      
      <br>
      
      
      <script>
            function showComplaints() {
               
            var labn = document.getElementById("lab").value;
            
            var checkboxes = document.getElementsByName('chk[]');
            var vals=[];
            for (var i=0, n=checkboxes.length;i<n;i++) 
            {
                  if (checkboxes[i].checked) 
                     {
                                 vals.push(checkboxes[i].value);
                     }
            }
            
            // console.log(labn,vals);
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
                var cont='<table><th>Srn No.</th><th>System no.</th><th>Complaint</th><th>Date</th>';
                var temp;
                //console.log(arr.sort());
                //arr.sort(function(a, b){return a - b});
                //console.log(arr.(1.toString()).labno);

               


                var optimise = [];
                for( var i=0; i<arr.length; i++)
                {
                   //console.log(arr[i].sysno.indexOf(','),arr[i].sysno.length,arr[i].sysno.split(','))
                    if(arr[i].labno == labn)
                     if (arr[i].sysno.indexOf(',') != -1)
                        for(var j=0; j<vals.length; j++)
                        {
                           syns=arr[i].sysno.split(',');
                           //console.log(syns)
                           for(var k=0; k<syns.length;k++)
                           if(syns[k] == vals[j])
                           {
                              var flag = 0;
                              for(var q=0;q<optimise.length;q++)
                              {
                                 if (optimise[q]==arr[i].comp_no)
                                    flag=1
                              }
                              // console.log(arr[i].comp_no);
                              if (flag == 0)
                              {
                                 cont = cont + "<tr><td>" + arr[i].comp_no + "</td>"+"<td>"+arr[i].sysno+"</td>"+"<td>"+arr[i].description+"</td>"+"<td>"+arr[i].created_at+"</td></tr>";
                                 optimise.push(arr[i].comp_no);
                              }
                              flag=0;
                           }  
                        }
                     else
                     {
                        //console.log("In else");
                        for(var j=0; j<vals.length; j++)
                        if(arr[i].sysno == vals[j])
                        {
                              cont = cont + "<tr><td>" + arr[i].comp_no + "</td>"+"<td>"+arr[i].sysno+"</td>"+"<td>"+arr[i].description+"</td>"+"<td>"+ arr[i].created_at +"</td></tr>";
                           optimise.push(arr[i].comp_no);
                        }
                     }
                }
                cont = cont + "</table><br><br>";
                //console.log(cont);
               //  if(cont=='<table><th>Complaint No.</th><th>Lab no.</th><th>System no.</th><th>Complaint</th></table><br><br>')
               //  {
               //     document.getElementById('pctb_nocomplaints').innerHTML ='No complaints';
               //  }
               //  else{
               //    document.getElementById('pctb').innerHTML = cont;   
               //  }
                document.getElementById('pctb').innerHTML = cont;
            
}
        </script>

      <div class="checkboxes">
         
         <input type="checkbox" id="mycheckbox" name="problem[]" value="mouse"><span>Mouse</span>
         <input type="checkbox" id="mycheckbox1" name="problem[]" value="keyboard"><span> Keyboard</span>
         <input type="checkbox" id="mycheckbox2" name="problem[]" value="monitor" ><span> Monitor</span>
         <input type="checkbox" id="mycheckbox3" name="problem[]" value="printer"><span> Printer</span>
         <input type="checkbox" id="mycheckbox4" name="problem[]" value="cro"><span> CRO</span>
         <input type="checkbox" id="mycheckbox5" name="problem[]" value="other"><span> Other</span>
         <br>	
      </div>

      <div class="txtb">
         <label>Give Feedback</label>
         <textarea  rows="5" cols="100" name="description" id="" required></textarea>
      </div>

      <div>
         <input type="submit" class="btn btn-success" id="b2" disabled value="Add New Complaint">
         <!-- <input class="btn btn-success" type="submit" value="submit" name="submit"> -->
      </div>
            
      <!-- <button  id="rm" class="btn btn-primary "> <a style="text-decoration:None;color:#fff;" href="logout.php">LOGOUT </a></button> -->
         
   </form>
   <!-- <button onclick="showComplaints()" class="">Show Previous Complaints</button> -->
</div>




</body>
</html>  