<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<link rel="stylesheet" href="css/headerstyle.css">
<link rel="stylesheet" href="css/footerstyle.css">

<title>Admin</title>

<style>

* {
	border-sizing: border-box;
}

/*.header {
  background-color: #af504c;
}*/

.header a.active {
	    background-color: #a32732;
	    color: white;
    }

.header{
  border-radius: 8px;
  width: 100%;
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

.selectLabNo {
  margin-bottom : 10px;
  margin-top : 60px;

}

/* <!-- PopUp --> */
.bg-model{
  background-color: rgba(0, 0, 0, 0.8);
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	display: none;  
	justify-content: center;
	align-items: center;
}

.modal-contents {
	height: 300px;
	width: 500px;
	background-color: white;
	text-align: center;
	padding: 20px;
	position: relative;
	border-radius: 4px;
}

input {
	margin: 15px auto;
	display: block;
	width: 50%;
	padding: 8px;
	border: 1px solid gray;
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

</style>
</head>

<body>

<!-- PopUp -->
<div class="bg-model">
  <div class="modal-contents">
    <div class="close">+</div>
      <img src="https://www.richardmiddleton.me/wp-content/themes/richardcodes/assets/img/avatar.png" alt="">

      <form action="">
        <input type="text" placeholder="Name">
        <input type="email" placeholder="E-Mail">
        <a href="#" class="button">Submit</a>
      </form>
  </div>  
</div>
<!-- PopUp Ends-->


<div class="header" id="myHeader">
    <a class="active" href="/admin_home">&#x26F7; Home</a>
		<a href="/testlogin">Logout</a>
    <a href="/admin_search">Search</a>
    <!-- delete me -->
    <a href="#" id="button" class="button">Click Me</a>
	</div>

<h3>Welcome '<span>{{$admin}}</span>' floor Admin!</h3>

<div class="btn-group">
  <a href="/add_system"><button>Add System</button></a>
  <a href="/add_admin"><button>Add Admin</button></a>
  <!-- <a href="/add_faculty"><button>Add Faculty</button></a> -->
  <a href="/transfer_pc1"><button>Transfer PC</button></a>
</div>

<div class="btn-group">
  <a href="/delete_system"><button>Remove System</button></a>
  <a href="/delete_admin"><button>Remove Admin</button></a>
  <!-- <a href="/delete_faculty"><button>Remove Faculty</button></a> -->
  <a href="/manage_issue"><button>Manage Issue</button></a>
</div>

<br><br>

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
          <td width="8%"><input type="text" style="background-color:#dddddd;font-size:17px;text-align:center;" name="comp_no" value="{{$complaint_frequency[$i]->srno}}" readonly></td>
          <td>{{$complaint_frequency[$i]->labno}}</td>
          <td>{{$complaint_frequency[$i]->sysno}}</td>
          <td>{{$complaint_frequency[$i]->problem}}</td>
          <td> {{date('d M, Y', strtotime($complaint_frequency[$i]->date)) }}</td>
          <td>{{$complaint_frequency[$i]->frequency}}</td>
          <td><a onclick="show_details({{$complaint_frequency[$i]->srno}})">More Details</a></td>
          <td><a><button >Confirm</button></a></td>
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
          <td><input type="text" style="background-color:#dddddd;font-size:17px;text-align:center;" name="comp_no" value="{{$complaint_frequency[$i]->comp_no}}"></td>
          <td>{{$complaint_frequency[$i]->labno}}</td>
          <td>{{$complaint_frequency[$i]->sysno}}</td>
          <td>{{$complaint_frequency[$i]->problem}}</td>
          <td> {{date('d M, Y', strtotime($complaint_frequency[$i]->date)) }}</td>
          <td>{{$complaint_frequency[$i]->complaint_frequency}}</td>
           <td><button>More Details</button></td>
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


// function show_details(value){
//   console.log(value);
//   alert("amankumar");
// }

function show_details(value){
  console.log(value);
  // alert("amankumar");
  
  alert("i got clicked");
	document.querySelector('.bg-model').style.display = "flex";
};
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
