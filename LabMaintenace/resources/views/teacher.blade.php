<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/teacher.css">
</head>


<body>

    <div class="header" id="myHeader">
        <a href="student.html" >homepage</a>
          <a href="#" >change password</a>
          <a href="#">logout</a>
	</div>
	
	<br><br><br><br>
	
	<div class="studentinfo">
    <p>Name: <input type="text" name="namev" readonly></p>
    <p>sdrn no.: <input type="text" name="sdrnv" readonly></p>
    <p>detail1: <input type="text" name="divisionv" readonly></p>
    <p>detail2: <input type="text" name="batchv" readonly></p>
    <p>detail3: <input type="text" name="yearv" readonly></p>
  </div>

  <div class="newcomplaint">
      <a class="a1" href="/teacher_com">new complaint</a>
  </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

<button class="select" onclick="openPage('Home', this, '#4CAF50')" id="defaultOpen"><b>solved complaints</b></button>
<button class="select" onclick="openPage('News', this, '#4CAF50')" ><b>ongoing complaints</b></button>
<button class="select" onclick="openPage('page', this, '#4CAF50')" ><b>confirmations</b></button>
<button class="select" onclick="openPage('line', this, '#4CAF50')" ><b>confirmed</b></button>


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
      <td>1</td>
      <td>516-A</td>
      <td>20</td>
      <td>Mouse</td>
      <td>Ongoing</td>
    </tr>
    <tr>
      <td>1</td>
      <td>516-A</td>
      <td>20</td>
      <td>Mouse</td>
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


<div id="page" class="complaintinfo">
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
          Roll no.
        </th>
        <th>
          Year
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
          <td>17CE2032</td>
          <td>TE</td>
          <td>Mouse</td>
          <td>-</td>
        </tr>
        <tr>
          <td>2</td>
          <td>513-A</td>
          <td>20</td>
          <td>17CE2036</td>
          <td>TE</td>
          <td>keyboard</td>
          <td>-</td>
        </tr>
        
      </table>
  
</div>
  
<div id="line" class="complaintinfo">
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
            Roll no.
          </th>
          <th>
            Year
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
          <td>17CE2032</td>
          <td>TE</td>
          <td>Mouse</td>
          <td>confirmed</td>
        </tr>
        <tr>
          <td>2</td>
          <td>513-A</td>
          <td>20</td>
          <td>17CE2036</td>
          <td>TE</td>
          <td>keyboard</td>
          <td>confrimed</td>
        </tr>
        
      </table>
  
     
</div>


<div class="footer">
  <p>footer</p>

</div>



<script src="js/filecomplaint.js"></script>



</body>
</html> 


