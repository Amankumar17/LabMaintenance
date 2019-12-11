<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=1024">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/slogincss.css">

    <title>Login</title>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <div class="login100-pic">
                <img src="img/raitlogo.png" alt="" class="logo">
            </div>

            <div class="login100-option">
                <ul class="tab-group">
		            <li class="tab active"><a href="#student">Student</a></li>
		            <li class="tab"><a href="#faculty">Faculty</a></li>
		            <li class="tab"><a href="#admin">Admin</a></li>
                    <li class="tab"><a href="#hod">HOD</a></li>
                </ul>
            
                <form action="/feedback" method="POST" class="login100-form" id="student">
                    <span class="login100-form-title"></span>
                    <div class="wrap-input100">
                        <input type="text" name="rollno" class="input100" placeholder="Roll Number" required>
                    </div>    
                    <div>
                        <input type="password" name="pass"  class="input100" placeholder="*******" required>
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="submit" value="Login" class="login100-form-btn">
                    </div>
                </form>

                <form action="/teacher" method="POST" class="login100-form" id="faculty">
                    <span class="login100-form-title"></span>
                    <div class="wrap-input100">
                        <input type="text" name="sdrn" class="input100" placeholder="SDRN" required>
                    </div>    
                    <div>
                        <input type="password" name="pass1"  class="input100" placeholder="*******" required>
                    </div>
                    <div class="container-login100-form-btn">
                    <input type="submit" value="Login" class="login100-form-btn">
                    </div>
                </form>

                <form action="/admin_home" method="POST" class="login100-form" id="admin">
                    <span class="login100-form-title"></span>
                    <div class="wrap-input100">
                        <input type="text" name="username" class="input100" placeholder="Admin...." required>
                    </div>    
                    <div>
                        <input type="password" name="pass2"  class="input100" placeholder="*******" required>
                    </div>
                    <div class="container-login100-form-btn">
                    <input type="submit" value="Login" class="login100-form-btn">
                    </div>
                </form>

                <form action="/hod_home" method="POST" class="login100-form" id="hod">
                    <span class="login100-form-title"></span>
                    <div class="wrap-input100">
                        <input type="text" name="hodname" class="input100" placeholder="Username...." required>
                    </div>    
                    <div>
                        <input type="password" name="pass3"  class="input100" placeholder="*******" required>
                    </div>
                    <div class="container-login100-form-btn">
                    <input type="submit" value="Login" class="login100-form-btn">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="{{ asset('js/login_page.js') }}"></script>

</body>
</html>