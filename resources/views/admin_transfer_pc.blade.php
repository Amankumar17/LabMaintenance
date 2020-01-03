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
    <a href="/admin_home">&#x26F7; Home</a>
		<a href="/testlogin">Logout</a>
  </div>

<center>
<br><br>
<h3>Add System Record</h3>
<br>

<div class="container">
<form action="/transfer_pc" method="POST">

<label for="labno">Please select the Lab</label>

<select id="lb" name="labno" required onchange="labsys(this.value)">
            <option value="" disabled selected>Select</option>
            @for($i=0; $i<$lab->count(); $i++)
                <option >{{$lab[$i]->labno}}</option>
            @endfor
        </select>

<br><br>

<label for="systemno">Please add the System</label>
<select id="syst" name="oldsys">
                
  <option value="" disabled selected>Select</option>
                
</select>

<br><br>

<label for="systemno">Please add the new lab number</label>
<select id="lb1" name="labno1" required>
            <option value="" disabled selected>Select</option>
            @for($i=0; $i<$lab->count(); $i++)
                <option >{{$lab[$i]->labno}}</option>
            @endfor
        </select>

<input type="submit" value="Submit">
</form>
</div>
</center>

<script>
  function labsys(value) {
    if (value.length==0) {
      document.getElementById("syst").innerHTML = '<option value="" disabled selected>Select</option>';
      }
    else {
      var obj = <?php echo json_encode($systems); ?>;
      var arr=[];

      for(a in obj) {
        arr.push(obj[a])
      }

      var cont='<option value="" disabled selected>Select</option>';

      for(i=0; i<arr.length; i++) {
        if(arr[i].labno == value) {
          cont = cont + "<option>" + arr[i].sys + "</option>";
        }
      }
      document.getElementById('syst').innerHTML = cont;
    }
    return 0;
  }

  </script>


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
