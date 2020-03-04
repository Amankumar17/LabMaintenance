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

<script>
  function validate(){
    var srNo = document.getElementById('srno');
    var date = document.getElementById('date');
    var itemName = document.getElementById('item');

    if (srNo.value != '' && date.value != '' && itemName.value != '') {
      alert('Data Saved');
    }

  }
</script>

<style>

* {
	border-sizing: border-box;
}

.header a.active {
	    background-color: #a32732;
	    color: white;
    }

.header{
  border-radius: 8px;
  width: 100%;
}

input[type="date"]:not(.has-value):before{
  color: gray;
  content: attr(placeholder);
}

</style>


</head>
<body>

<!-- <div class="header" id="myHeader">
    <a class="active" href="/admin_home">&#x26F7; Home</a>
	<a href="/testlogin">Logout</a>
    <a href="/admin_search">Search</a>
    <a href="/admin_deadstock">Deadstock</a>
</div> -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid" id="myHeader">
    <div class="navbar-header">
      <a class="navbar-brand">Dy Patil RAIT</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/admin_home">Home</a></li>
      <!-- <li><a href="/admin_search">Search</a></li> -->
      <li><a href="/admin_deadstock">Deadstock</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/testlogin"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav>

<div class="container body-content">

<button class="btn btn-primary" onclick="window.location.href = '/view_registry'" style="float:right;">VIEW REGISTRY</button>
  <form action="/admin_deadstock_form" method="POST">
    <div class="row justify-content-start" style="padding-top:10px;">
      <h1> Fill Up the details </h1>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="srno" placeholder="Enter SrNo" name="srno" required>
    </div>
    <div class="form-group">
      <input type="date" class="form-control" id="date" placeholder="Date :-" name="date" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="item" placeholder="Name of item" name="name_of_item" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="" placeholder="Description" name="description">
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="" placeholder="Warranty" name="warranty">
    </div>
    <div class="form-group">
      <input type="number" class="form-control" id="" placeholder="Quantity" name="quantity">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="" placeholder="Amount" name="amount">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="" placeholder="GPR_RefNo" name="gpr_refno">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="" placeholder="Supplier" name="supplier">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="" placeholder="Bill No" name="bill_no">
    </div>
    <div class="form-group">
      <input type="date" class="form-control" id="" placeholder="Purchase Date :-" name="purchase_date">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="" placeholder="Disposal" name="disposal">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="" placeholder="Remark" name="remark">
    </div>
    <button onclick="validate()" type="submit" class="btn btn-primary">SAVE</button>
  </form>  

</div>

<!-- FOOTER START -->
<div class="footer" style="margin-top:5%; font-family:courier new; border-top: 2px solid #af504c;">
<br>Site by<br>
Amankumar Shrivastava,
Saurabh Varade,
Siddhi Jagtap,
Rasika Deshmukh,
<br>
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
