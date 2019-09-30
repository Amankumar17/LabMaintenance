<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/filecomplaint.css">

</head>
<body>

  <div class="header" id="myHeader">
    <a href="/student" >homepage</a>
    <a href="#" >change password</a>
    <a href="#">logout</a>
	</div>
	
  <br><br><br>
  <p class="heading">Problems:</p>
    <div class="checkboxes">
      <input type="checkbox" id="mycheckbox" name="mouse" value="mousev" style="line-height: 2%">   Mouse<br>
      <input type="checkbox" id="mycheckbox1" name="keyboard" value="keyboardv">   Keyboard<br>
      <input type="checkbox" id="mycheckbox2" name="monitor" value="monitorv" >   monitor<br>
      <input type="checkbox" id="mycheckbox3" name="cpu" value="cpuv">   CPU<br>
      <input type="checkbox" id="mycheckbox4" name="printer" value="printerv">   Printer<br>
      <input type="checkbox" id="mycheckbox5" name="other" value="otherv" >   other<br><br>	
    </div>


  <p style="color:red;font-size: 13px;margin-left: 1%">*Decription is required</p>
  <form action="/filecomplaint">
    <textarea rows="9" cols="100" size="60%" name="description" placeholder="Description" required></textarea>
    
    <br><br><br>
    <a href="/student" class="back" > Back </a>
    <div class="select"><input type="submit" onclick="myFunction()" value="Submit" ></div>
  </form>
  <br><br><br><br><br>
    <div class="footer">
      <p>footer</p>
    </div>
    
    <script src="js/filecomplaint.js"></script>
    
                      


</body>
</html> 
