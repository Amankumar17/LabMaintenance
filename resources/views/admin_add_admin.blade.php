<!DOCTYPE html>
<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Add Admin</title>
            <style>
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


<center>
<div>
    <h3>Add Admin</h3>
    <form action="/admin_demo1">
    <label for="adminname">Username</label>
    <input type="text" id="adname" name="newname" placeholder="Username" required>
    <br><br>  
    <label for="pass">Password</label>
    <input type="password" id="adpass" name="pass1" placeholder="Password" required>
    <br><br>
    <label for="pass">Confirm Password</label>
    <input type="password" id="adcpass" name="pass2" placeholder="Password" required>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</div>
</center>
</body>
</html>


