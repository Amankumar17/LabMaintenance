

<!DOCTYPE html>
<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Delete Admin</title>
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
    <h3>Delete Admin</h3>
    <form action="#">
    <label for="adminname">Admin Username to be Deleted</label>
    <select id="Username" name="admin" required>
            <option value="">admin</option>
            <option value="australia">abc</option>
            <option value="canada">xyz</option>
            <option value="usa">pqr</option>
    </select>
    <br><br>  
    <label for="pass">Password</label>
    <input type="password" id="adpass" name="pass" placeholder="Your Password" required>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</div>
</center>
</body>
</html>
