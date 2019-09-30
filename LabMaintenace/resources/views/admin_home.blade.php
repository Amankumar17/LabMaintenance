<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin</title>

<style>

* {
	border-sizing: border-box;
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
}

.btn-group button:hover {
	/*background: #e3dcda;*/
	background: #fff;
	color: #666;
}

h3 {
	font-size: 40px;
	font-family: ink free;
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
  padding: 100px 20px;
  height: 100%;
}

#New, #Ongoing, #History {background-color: #e5e4e2;}

p {
	font-size: 20px;
	margin: 10px 5%;
}

</style>
</head>

<body>

<div>
</div>

<h3>Welcome Admin!</h3>

<div class="btn-group">
  <a href="/add_system"><button>Add System</button></a>
  <a href="/add_admin"><button>Add Admin</button></a>
  <a href="/add_faculty"><button>Add Faculty</button></a>
</div>

<div class="btn-group">
  <a href="/delete_system"><button>Remove System</button></a>
  <a href="/delete_admin"><button>Remove Admin</button></a>
  <a href="#"><button>Remove Faculty</button></a>
</div>


<br><br>

<button class="tablink" onclick="openPage('New', this, '#c88380')" id="defaultOpen">New</button>
<button class="tablink" onclick="openPage('Ongoing', this, '#c88380')">Ongoing</button>
<button class="tablink" onclick="openPage('History', this, '#c88380')">History</button>

<div id="New" class="tabcontent">
  <h3>New Complaints</h3>
  <p>New Complaints...</p>
</div>

<div id="Ongoing" class="tabcontent">
  <h3>Ongoing Complaints</h3>
  <p>Ongoing Complaints...</p> 
</div>

<div id="History" class="tabcontent">
  <h3>Previous Complaints</h3>
  <p>Previous Complaints...</p>
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





</body>
</html> 
