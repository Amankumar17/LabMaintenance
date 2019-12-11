

<!DOCTYPE html>
<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/headerstyle.css">
        <link rel="stylesheet" href="css/footerstyle.css">

            <title>Delete Admin</title>
            <style>
              .header {
	            margin: 0 0 -4% 0;
              }

              input[type=text], select {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
            }
            
            input[type=password], select {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
            }

            input[type=submit] {
              width: 20%;
              background-color: #4CAF50;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }
            
            input[type=submit]:hover {
              background-color: #45a049;
            }
            
            div {
              position: relative;
              width: 50%;
              border-radius: 5px;
              background-color: #f2f2f2;
              padding: 2%;
              margin-top: 10%;
            }

            label {
              float: left;
            }

            </style>
        </head>

<body>

<div class="header" id="myHeader">
    <a href="/admin_home">&#x26F7; Home</a>
		<a href="/testlogin">Logout</a>
  </div>

<center>
<div>
    <h3>Delete Admin</h3>
    <form action="/admin_demo2" method="POST">
    <label for="adminname">Admin Username to be Deleted</label>
    <input type="text" name="admin" placeholder="Admin Username" required>
 
    <br><br>  
    <label for="pass">Password</label>
    <input type="password" id="adpass" name="pass" placeholder="Password" required>
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
