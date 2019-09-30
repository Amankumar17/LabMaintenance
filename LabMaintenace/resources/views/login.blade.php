<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
	<link href="{{ asset('css/login_page.css') }}" rel="stylesheet" type="text/css" >
        <style>
            
        </style>
    </head>
    <body>
        <div class="header">
<img src="img/dypatil-logo.png" alt="dy-patil-logo"> 
<br><br>
<pre><h1 style="color:brown; font-family: century gothic;">			Ramrao Adik Institute of Technology</h1></pre>
</div>

<div class='clear1'></div>
<br>
<div class="forms">
	<ul class="tab-group">
		<li class="tab active"><a href="#student">Student</a></li>
		<li class="tab"><a href="#faculty">Faculty</a></li>
		<li class="tab"><a href="#admin">Admin</a></li>
	</ul>
	<form action="/student" id="student">
	      <h1>Student</h1>
	      <div class="input-field">
	        <label for="rollno">Roll No</label>
	        <input type="text" name="rollno" required/><br>
	        <label for="password">Password</label> 
	        <input type="password" name="password" required/><br>
	        <input type="submit" value="Login" class="button"/>
	        <p class="text-p"> <a href="#">Forgot password?</a> </p>
	      </div>
	  </form>
	<form action="/teacher" id="faculty">
	      <h1>Faculty</h1>
	      <div class="input-field">
	        <label for="sdrn">Sdrn</label> 
	        <input type="text" name="sdrn" required/><br>
	        <label for="password">Password</label> 
	        <input type="password" name="password" required/><br>
	        <input type="submit" value="Login" class="button" />
		<p class="text-p"> <a href="#">Forgot password?</a> </p>
	      </div>
	  </form>
	<form action="/admin_home" id="admin">
	      <h1>Admin</h1>
	      <div class="input-field">
	        <label for="username">Username</label> 
	        <input type="text" name="username" required/><br>
	        <label for="password">Password</label> 
	        <input type="password" name="password" required/><br>
	        <input type="submit" value="Login" class="button" />
		<p class="text-p"> <a href="#">Forgot password?</a> </p>
	      </div>
	  </form>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript" src="{{ asset('js/login_page.js') }}"></script>

    </body>
</html>
