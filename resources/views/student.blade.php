<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/headerstyle.css">
<link rel="stylesheet" href="css/footerstyle.css">
<link rel="stylesheet" href="css/student.css">

</head>


<body>

<div class="header" id="myHeader">
    <a class="active" href="">&#x26F7; Home</a>
		<a href="">New Complaint</a>
		<a href="/login">Logout</a>
	</div>


  <form action="/student_com" >
	<div class="studentinfo">
    <p><b>Name:</b> <input type="text" style="margin-right:26%;" name="namev" size="35" value='{{$stud_details[0]->First_name}} {{$stud_details[0]->Middle_name}} {{$stud_details[0]->Last_name}}' readonly></p>
    <p><b>Roll no: </b><input type="text" name="rollv" value='{{$stud_details[0]->Roll_no}}' readonly></p>
    <p><b>Division: </b><input type="text" name="divisionv" value='{{$stud_details[0]->Division}}' readonly></p>
    <p><b>Batch: </b><input type="text" name="batchv" value='{{$stud_details[0]->Batch}}' readonly></p>
    <p><b>Year: </b><input type="text" name="yearv" value='{{$stud_details[0]->Year}}' readonly></p>
  </div>
  
  
  <div class="newcomplaint">
      <input type="submit" class="a1" value="New Complaint">
  </div>
  </form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<button class="select" onclick="openPage('News', this, '#4CAF50')" id="defaultOpen"><b>Complaints In Progress</b></button>
<button class="select" onclick="openPage('Home', this, '#4CAF50')"><b>Solved Complaints</b></button>

<br>
<div id="Home" class="complaintinfo">
  <table id="myTable" cellpadding="10">
    <th>
      Complaint No.
    </th>
    <th>
      Lab No.
    </th>
    <th>
      System No.
    </th>
    <th>
      Complaint Description
    </th>
       
    @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==3)
      <tr>
          <td width="8%">{{$complaint[$i]->comp_no}}</td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="8%">{{$complaint[$i]->sysno}}</td>
          <td >{{$complaint[$i]->description}}</td>
      </tr>
      @endif
          
    @endfor
     
  </table>
</div>

<div id="News" class="complaintinfo">
    <table id="myTable" cellpadding="10">
    
    <th >
      Complaint No.
    </th>
    <th>
      Lab No.
    </th>
    <th>
      System No.
    </th>
    <th>
      Complaint Description
    </th>
    <th>
      Status
    </th>    
        
        @for ($i=0;$i<$complaint->count();$i++)
        @if($complaint[$i]->status!=3)
        <tr>
          <td width="8%">{{$complaint[$i]->comp_no}}</td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="10%">{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td width="8%">
          @if ($complaint[$i]->status==0)
            Not yet Approved
          @elseif ($complaint[$i]->status==1)
            Yet to be viewed by Admin
          @else
            Underprocess
          @endif
          </td>
        </tr>
        @endif
        
        @endfor
        

        
      </table>
   
</div>
<br><br>

<!-- FOOTER START -->
<div class="footer">
<br>Site by<br>
Amankumar Shrivastava,
Saurabh Varade,
Siddhi Jagtap,
Rasika Deshmukh,
Pratik Aher,
Gaurav Gajare,
Lokesh Badgujar
<br>
<br>Under the guidance of<br>
Dr. Amit Barve

<br><br><br>
Copyright © 2019 Ramrao Adik Institute of Technology
</div>
<!-- END OF FOOTER -->

<script src="js/filecomplaint.js"></script>
    





</body>
</html> 


