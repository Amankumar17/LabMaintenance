<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/student.css">
</head>


<body>

    <div class="header" id="myHeader">
        <a href="/student" >homepage</a>
          <a href="#" >change password</a>
          <a href="#">logout</a>
	</div>
	
	<br><br><br><br>
	
	<div class="studentinfo">
    <p>Name: <input type="text" name="namev" readonly></p>
    <p>Roll no.: <input type="text" name="rollv" readonly></p>
    <p>Division: <input type="text" name="divisionv" readonly></p>
    <p>Batch: <input type="text" name="batchv" readonly></p>
    <p>Year: <input type="text" name="yearv" readonly></p>
  </div>

  <div class="newcomplaint">
      <a class="a1" href="/student_com" >new complaint</a>
  </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

<button class="select" onclick="openPage('Home', this, '#4CAF50')" id="defaultOpen"><b>solved complaints</b></button>
<button class="select" onclick="openPage('News', this, '#4CAF50')" ><b>ongoing complaints</b></button>


<div id="Home" class="complaintinfo">
  <table id="myTable" >
    <th>
      Serial No.
    </th>
    <th>
      Lab no.
    </th>
    <th>
      System no.
    </th>
    <th>
      Complaint
    </th>
    <th>
      Status
    </th>    

    <tr>
      <td>1</td>
      <td>516-A</td>
      <td>20</td>
      <td>Mouse</td>
      <td>Ongoing</td>
    </tr>
    <tr>
      <td>2</td>
      <td>513-A</td>
      <td>20</td>
      <td>keyboard</td>
      <td>Ongoing</td>
    </tr>
    <tr>
      <td>2</td>
      <td>513-A</td>
      <td>20</td>
      <td>keyboard</td>
      <td>Ongoing</td>
    </tr>
    <tr>
      <td>2</td>
      <td>513-A</td>
      <td>20</td>
      <td>keyboard</td>
      <td>Ongoing</td>
    </tr>
  </table>
</div>

<div id="News" class="complaintinfo">
    <table id="myTable" >
        <th>
          Serial No.
        </th>
        <th>
          Lab no.
        </th>
        <th>
          System no.
        </th>
        <th>
          Complaint
        </th>
        <th>
          Status
        </th>    
    
        <tr>
          <td>1</td>
          <td>516-A</td>
          <td>20</td>
          <td>Mouse</td>
          <td>completed</td>
        </tr>
        <tr>
          <td>2</td>
          <td>513-A</td>
          <td>20</td>
          <td>keyboard</td>
          <td>completed</td>
        </tr>
        
      </table>
   
</div>

<div class="footer">
  <p>footer</p>

</div>

    <script src="js/filecomplaint.js"></script>
    





</body>
</html> 


