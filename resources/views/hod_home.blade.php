<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/headerstyle.css">
<link rel="stylesheet" href="css/footerstyle.css">

<title>HOD</title>

<style>

* {
	border-sizing: border-box;
}

/*.header {
  background-color: #af504c;
}*/

.header a.active {
	    background-color: rgb(41, 139, 44);
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
	height: 120px;
	margin: 30px 5%;
	padding: 10px;
	font-family: century gothic;
	/*background: #d2d9db;*/
	border: none;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	text-align: center;
	background-color: #4CAF50;
	color: white;
   font-size: 20px;
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

</style>
</head>

<body>

<div class="header" id="myHeader">
    <a class="active" href="/hod_home">&#x26F7; Home</a>
		<a href="/testlogin">Logout</a>
	</div>

<h3>Welcome'<span>{{$hodname}}</span>'!</h3><br>

<center>
<div class="btn-group">
  <a href="/chart_options"><button>Generate Charts</button></a>
  <a href="/report_options"><button>Generate Reports</button></a>
</div>
</center>

<br><br><br>

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
      Roll No.
    </th>
    <th>
      SDRN
    </th>        
    <th>
      Description
    </th>
    <th>
      Date
    </th>   
    
    @for($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==1)
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
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->updated_at)) }}</td>
      </tr>
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
      Roll No.
    </th>
    <th>
      SDRN
    </th>        
    <th>
      Description
    </th>
    <th>
      Date
    </th>   
    
    @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==2)
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
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->updated_at)) }}</td>
      </tr>
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
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->updated_at)) }}</td>
          
      </tr>
      @endif
          
    @endfor
     
  </table>
</div>


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
</script>

<!-- FOOTER START -->
<div class="footer" style="margin-top:5%; font-family:courier new; border-top: 2px solid #af504c;">
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
