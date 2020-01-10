<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/headerstyle.css">
<link rel="stylesheet" href="css/footerstyle.css">

<title>Delete_Issue</title>

<style>
body {
	font-family: Arial, Helvetica, sans-serif;
	background: ;
}

* {
	box-sizing: border-box;
}

.container {
  width: 50%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

h3 {
	font-family: 'Courier new', sans-serif;
}

select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
</head>
<body>

<div class="header" id="myHeader">
    <a href="/admin_home">&#x26F7; Home</a>
		<a href="/testlogin">Logout</a>
  </div>

<center>
<br><br>
<h3>Delete Issue</h3>
<br>

<div class="container">
<form action=" /admin_demo4" method="POST">

<label for="labno">Delete the Issue</label>
<select  name="issue" >
  <option value="" disabled selected>Select</option>
    @for($i=0; $i<$issue->count(); $i++)
      <option >{{$issue[$i]->issue}}</option>
    @endfor
</select>
<br><br>




<input type="submit" value="Submit">
</form>
</div>
</center>



<!-- FOOTER START -->
<div class="footer" style="margin-top:9%; font-family:courier new;">
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
