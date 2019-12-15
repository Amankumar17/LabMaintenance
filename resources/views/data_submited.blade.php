<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Submitted</title>
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	
    <style>

    body{
        background: #a32732;
    }
    
    .contact-form{
        width: 85%;
        max-width: 600px;
        background: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 30px 40px;
        box-sizing: border-box;
        border-radius: 10px;
        text-align: center;
        font-family: "Montserrat", sans-serif;
    }

    .contact-form h1{
        margin: 20px;
        font-weight: 600;
    }

</style>
</head>
<body>

  <div class="contact-form">
  
    <h1>Complaint Submitted Successfully</h1>
        <form action="/feedback" method="POST">
            <button class="btn btn-primary">Back</button>
        </form>
    </div>

</body>
</html>