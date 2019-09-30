
<!DOCTYPE html>
<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="/">
            <title>Add Admin</title>
            
        </head>


<body>


<center>
<div>
    <h3>Add Admin</h3>
    <form action="#">
    <label for="adminname">Admin Username</label>
    <input type="text" id="adname" name="adminname" placeholder="Username" reqiured>
    <br><br>  
    <label for="pass">Password</label>
    <input type="password" id="adpass" name="pass" placeholder="Password" required>
    <br><br>
    <label for="pass">Confirm Password</label>
    <input type="password" id="adcpass" name="pass" placeholder="Password">
    <br><br>
    <input type="submit" value="Submit">
  </form>
</div>
</center>
</body>
<!-- <link href="{!! HTML::style('public/css/lb_1.css') !!}" rel="stylesheet"> -->

<link href="{{ asset('public/css/lb_1.css')}}" type="text/css"  rel="stylesheet">
</html>

