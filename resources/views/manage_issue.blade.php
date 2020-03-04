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

</style>
</head>

<body>

<!-- PopUp -->
<div class="bg-model">
  <div class="bg-content">

  </div>  
</div>

<div class="header" id="myHeader">
    <a class="active" href="/admin_home">&#x26F7; Home</a>
		<a href="/testlogin">Logout</a>
    <a href="/admin_search">Search</a>
	</div>



<div class="btn-group">
  <a href="/manage_issue_insert"><button>Insert Issue</button></a>
  <a href="/manage_issue_delete"><button>Delete Issue</button></a>
 
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



</body>
</html> 
