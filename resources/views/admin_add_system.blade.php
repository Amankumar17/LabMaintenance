<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/headerstyle.css">
<link rel="stylesheet" href="css/footerstyle.css">

<title>Add System</title>

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

input[type=text]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;

}

</style>
</head>
<body>

<div class="header" id="myHeader">
    <a class="active" href="">&#x26F7; Home</a>
		<a href="/testlogin">Logout</a>
  </div>

<center>
<br><br>
<h3>Add System Record</h3>
<br>

<div class="container">
<form action="/system_demo1">

<label for="labno">Please select the Lab</label>

<select id="lb" name="labno" required>
            <option value="" disabled selected>Select</option>
            @for($i=0; $i<$lab->count(); $i++)
                <option >{{$lab[$i]->labno}}</option>
            @endfor
        </select>

<br><br>

<label for="systemno">Please select the System</label>
<input type="text" id="lab" name="newsys">

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
