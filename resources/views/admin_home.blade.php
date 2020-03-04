<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/headerstyle.css">
<link rel="stylesheet" href="css/footerstyle.css">

<title>Admin</title>

<style>

*{
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.header{
  overflow: hidden;
  width: 100%;
}

.btn {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #666;
  cursor: pointer;
  font-size: 18px;
}

.active, .btn:hover {
  background-color: #a32732;
  color: white;
}

.btn-group {
  width: 100%;
}

.btn-group a:link, a:visited {
	color: white;
	text-decoration: none;
}

.btn-group button {
  width: 22%;
  min-width: 210px;
	height: 100px;
	margin: 30px 5%;
	padding: 10px;
	font-family: century gothic;
  border: none;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	text-align: center;
	background-color: #4CAF50;
	color: white;
   font-size: 30px;
   cursor: pointer;
}

.btn-group button:hover {
	/*background: #e3dcda;*/
	background: #fff;
	color: #666;
}

h3 {
	font-size: 40px;
	font-family: courier new;
	margin: 15px 5%;
}

.tablink {
  background-color: #af504c;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 18px;
  font-family: century gothic;
  width: 33.33%;
}

.tablink:hover {
  background: #fff;
  color: #666;
}

.tabcontent {
  color: #333;
  display: none;
  height: 100%;
}

.tabcontent button {
  font-family: courier new;
  padding: 3px 6px;
  cursor: pointer;
}

#New, #Ongoing, #History {background-color: #e5e4e2;}

p {
	font-size: 20px;
	margin: 10px 5%;
}

table{
  width:100%;
  font-family: century gothic;
  border-collapse: collapse;
}

th{
  width:13%;
  height:50px;
  text-align:center;
  border: 1px solid #dddddd;
} 
td{
  width:13%;
  height:40px;
  border: 1px solid #dddddd;
  text-align:center;

}
tr:nth-child(even) {
  background-color: #dddddd;
}
input {
  border: none;
  font-size: 40px;
	font-family: ink free;
}

.selectLabNo {
  margin-bottom : 10px;
  margin-top : 60px;

}

/* <!-- PopUp --> */
.bg-model{
  background-color: rgba(0, 0, 0, 0.8);
	width: 100%;
	height: 100%  ;
	position: fixed;
	top: 0;
	display: none;  
	justify-content: center;
	align-items: center;
}

.modal-contents {
	height: 500px;
	width: 800px;
	background-color: white;
	text-align: center;
	padding: 35px;
	position: relative;
	border-radius: 4px;
}



.close {
	position: absolute;
	top: 0;
	right: 10px;
	font-size: 42px;
	color: #333;
	transform: rotate(45deg);
	cursor: pointer;
	&:hover {
		color: #666;
	}
}

/* <!-- PopUp Ends--> */


.button {
  cursor: pointer;
}

</style>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid" id="myHeader">
    <div class="navbar-header">
      <a class="navbar-brand">Dy Patil RAIT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="/admin_search">Search</a></li>
      <li><a href="/admin_deadstock">Deadstock</a></li>
      <li><a href="/system_logs">System Logs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/testlogin"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav>

<h3>Welcome '<span>{{$admin}}</span>' floor Admin!</h3>

<div class="btn-group">
  <a href="/add_system"><button type="button" class="btn btn-success">Add System</button></a>
  <a href="/add_admin"><button type="button" class="btn btn-success">Add Admin</button></a>
  <a href="/transfer_pc1"><button type="button" class="btn btn-success">Transfer PC</button></a>
</div>

<div class="btn-group">
  <a href="/delete_system"><button type="button" class="btn btn-success">Remove System</button></a>
  <a href="/delete_admin"><button type="button" class="btn btn-success">Remove Admin</button></a>
  <a href="/manage_issue"><button type="button" class="btn btn-success">Manage Issue</button></a>
</div>

<br><br>

<div>
  <button class="tablink" onclick="openPage('New', this, '#c88380')" id="defaultOpen">New</button>
  <button class="tablink" onclick="openPage('Ongoing', this, '#c88380')">In Progress</button>
  <button class="tablink" onclick="openPage('History', this, '#c88380')">Previously Resolved</button>

<div id="New" class="tabcontent">
<table id="myTable" >
    <th>
      Complaint No.
    </th>
    <th>
      Lab No.
    </th>
    <th>
      System No.
    </th>
    <th>
      Problem
    </th>       
    <th>
      Date
    </th> 
    <th>
      Count
    </th>
    <th>
      Show Details
    </th>
    <th>
      Status
    </th>   
    @for($i=0;$i<$complaint_frequency->count();$i++)
      @if($complaint_frequency[$i]->status==1)
      
      <form action="/admin_confirm" method="POST">
      <tr>
          <td width="8%"><input type="text" style="background-color:#dddddd;font-size:17px;text-align:center;" name="srno" value="{{$complaint_frequency[$i]->srno}}" readonly></td>
          <td>{{$complaint_frequency[$i]->labno}}</td>
          <td>{{$complaint_frequency[$i]->sysno}}</td>
          <td>{{$complaint_frequency[$i]->problem}}</td>
          <td> {{date('d M, Y', strtotime($complaint_frequency[$i]->date)) }}</td>
          <td>{{$complaint_frequency[$i]->frequency}}</td>
          <td><a class="button" onclick="show_details({{$complaint_frequency[$i]->srno}})">More Details</a></td>
          <td><a><button >Viewed</button></a></td>
      </tr>
      </form>
      @endif
          
    @endfor
    
  </table>
</div>

<div id="Ongoing" class="tabcontent">
<table id="myTable" >
<th>
      Complaint No.
    </th>
    <th>
      Lab No.
    </th>
    <th>
      System No.
    </th>
    <th>
      Problem
    </th>       
    <th>
      Date
    </th> 
    <th>
      Count
    </th>
    <th>
      Show Details
    </th> 
    <th>
      Status
    </th>   
    
    @for ($i=0;$i<$complaint_frequency->count();$i++)
      @if($complaint_frequency[$i]->status==2)
      <form action="/admin_done" method="POST">
      <tr>
          <td><input type="text" style="background-color:#dddddd;font-size:17px;text-align:center;bordor:none;" name="srno" value="{{$complaint_frequency[$i]->srno}}"></td>
          <td>{{$complaint_frequency[$i]->labno}}</td>
          <td>{{$complaint_frequency[$i]->sysno}}</td>
          <td>{{$complaint_frequency[$i]->problem}}</td>
          <td> {{date('d M, Y', strtotime($complaint_frequency[$i]->date)) }}</td>
          <td>{{$complaint_frequency[$i]->frequency}}</td>
           <td><a class="button" onclick="show_details({{$complaint_frequency[$i]->srno}})">More Details</a></td>
          <td><button name='done'>Done</button></td>
      </tr>
      </form>
      @endif
          
    @endfor
     
  </table>
</div>

<div id="History" class="tabcontent">
<table id="myTable" >
    <th>
      Complaint No.
    </th>
    <th>
      Lab No.
    </th>
    <th>
      System No.
    </th>
    <th>
      Roll No.
    </th>
    <th>
      SDRN
    </th>
    <th>
      Problem
    </th>    
    <th>
      Description
    </th>
    <th>
      Date
    </th> 
    
    @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==3)
      <tr>
          <td>{{$complaint[$i]->comp_no}}</td>
          <td>{{$complaint[$i]->labno}}</td>
          <td>{{$complaint[$i]->sysno}}</td>
          @if($complaint[$i]->rollno=='NULL')
          <td>-</td>
          @else
          <td>{{$complaint[$i]->rollno}}</td>
          @endif          
          <td>{{$complaint[$i]->sdrn}}</td>
          <td>{{$complaint[$i]->problem}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->updated_at)) }}</td>

      </tr>
      @endif
          
    @endfor
     
  </table>
</div>


</div>

<!-- FOOTER START -->
<div class="footer" style="margin-top:5%; font-family:courier new; border-top: 2px solid #af504c;">
<br>Site by<br>
Amankumar Shrivastava,
Saurabh Varade,
Siddhi Jagtap,
Rasika Deshmukh,
Pratik Aher,
Gaurav Gajare,
Lokesh Badgujar
<br>
<br>Under the guidance of<br>
Dr. Amit Barve

<br><br><br>
Copyright © 2019 Ramrao Adik Institute of Technology
</div>
<!-- END OF FOOTER -->

<!-- PopUp -->
<div class="bg-model">
  <div class="modal-contents">
    <div class="close">+</div>
      <div id="popup">
  
      </div>
          
      
  </div>  
</div>
<!-- PopUp Ends-->

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


function show_details(value){
  // console.log(value);

  var cont = "";
  var obj = <?php echo json_encode($complaint_frequency); ?>;
  var arr_complaints=[];
  var i;
  var arr =[];
  for(a in obj)
      {
        arr.push(obj[a]);
      }
  
  for(var i=0;i<arr.length;i++)
  {
      if (arr[i].srno==value)
      {
          arr_complaints = arr[i].comp_nos.split(',');
          console.log(arr_complaints);
          break;
      }
  }

  var obj1 = <?php echo json_encode($complaint); ?>;
  var arr1 =[];
  for(a in obj1)
      {
        arr1.push(obj1[a]);
      }
  
  cont = cont + "<table><tr><th>Complaint No.</th><th>Roll_no</th><th>sdrn</th><th>Date</th><th>Description</th></tr>"
  

  for(var i=0;i<arr_complaints.length;i++)
  {
    arr_complaints[i] = parseInt(arr_complaints[i]);
  }
  console.log(arr_complaints);

  for(var j=0;j<arr_complaints.length;j++)
  {
      for(var i=arr1.length-1;i>=0;i--)
      {
        console.log(arr1[i].comp_no);
          if(arr1[i].comp_no==arr_complaints[j])
          {
              cont = cont + "<tr><td>"+arr1[i].comp_no+"</td><td>"+arr1[i].rollno+"</td><td>"+arr1[i].sdrn+"</td><td>"+arr1[i].created_at+"</td><td>"+arr1[i].description+"</td></tr>";
              break;
          }
      }
  }
  cont = cont + "</table>"
  console.log(cont);
  document.getElementById('popup').innerHTML = cont;

	document.querySelector('.bg-model').style.display = "flex";

}

  document.querySelector('.close').addEventListener("click", function() {
  document.querySelector('.bg-model').style.display = "none";

});


// document.getElementById('button').addEventListener("click", function() {
//   alert("i got clicked");
// 	document.querySelector('.bg-model').style.display = "flex";
// });
// document.querySelector('.close').addEventListener("click", function() {
// 	document.querySelector('.bg-model').style.display = "none";
// });




</script>









</body>
</html> 
