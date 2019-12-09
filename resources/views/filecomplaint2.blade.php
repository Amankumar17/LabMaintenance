<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/headerstyle.css">
<link rel="stylesheet" href="css/footerstyle.css">
<link rel="stylesheet" href="css/filecomplaint.css">

</head>
<body>

<div class="header" id="myHeader">
      <a href="">&#x26F7; Home</a>
			<a class="active"href="">New Complaint</a>
			<a href="/testlogin">Logout</a>
	</div>
  <br>
  <p style="margin-left:17%;font-size:21px"><b>Details:</b></p>
  
  <form  action="/go2">
  <div class="box1">
  <label for="roll" style="margin-left:17%;font-size:21px">Sdrn:</label><input type="text" name='sdrn' class="in"  style="margin-left:28px" value='{{$sdrn}}' readonly>
    <br><label for="roll" style="margin-left:17%;font-size:21px">Labno:</label><input type="text" name="op"  style="margin-left:15px" value='{{$labno}}' readonly>
    <br><label for="roll" style="margin-left:17%;font-size:21px">Sys no:</label><input type="text" name="system"  style="margin-left:5px" value='{{$systemno}}' readonly>
</div>
  <br>
  <p class="heading" style="margin-left:17%"><b>Problems:</b></p>

    <div class="checkboxes">
      <input type="checkbox" id="mycheckbox" name="mouse" value="mouse" style="line-height: 2%">   Mouse<br>
      <input type="checkbox" id="mycheckbox1" name="keyboard" value="keyboard">   Keyboard<br>
      <input type="checkbox" id="mycheckbox2" name="monitor" value="monitor" >   Monitor<br>
      <input type="checkbox" id="mycheckbox3" name="cpu" value="cpu">   CPU<br>
      <input type="checkbox" id="mycheckbox4" name="printer" value="printer">   Printer<br>
      <input type="checkbox" id="mycheckbox5" name="other" value="other" >   Other<br><br>	
    </div>


  <p style="color:red;font-size: 13px;margin-left: 15%">*Decription is required</p>
  
    <textarea rows="9" cols="70" size="60%" style="margin-left:15%" name="description" placeholder="Description" required></textarea>
    
    <br><br><br>

    <a href="" class="back" > Back </a>
    <div class="select"><input type="submit" onclick="myFunction()" value="Submit" ></div>
    
  </form>

    <!-- FOOTER START -->
  <div class="footer" style="margin-top:5%;">
  <br>Site by<br>
  Amankumar Shrivastava,
  Saurabh Varade,
  Siddhi Jagtap,
  Rasika Deshmukh
  <br><br><br>
  Copyright © 2019 Ramrao Adik Institute of Technology
  </div>
  <!-- END OF FOOTER -->
    
    <script src="js/filecomplaint.js"></script>
    
                      


</body>
</html> 
