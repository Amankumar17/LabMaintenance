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
    <p>Name: <input type="text" name="namev" value='{{$stud_details[0]->First_name}} {{$stud_details[0]->Middle_name}} {{$stud_details[0]->Last_name}}' readonly></p>
    <p>Roll no.: <input type="text" name="rollv" value='{{$stud_details[0]->Roll_no}}' readonly></p>
    <p>Division: <input type="text" name="divisionv" value='{{$stud_details[0]->Division}}' readonly></p>
    <p>Batch: <input type="text" name="batchv" value='{{$stud_details[0]->Batch}}' readonly></p>
    <p>Year: <input type="text" name="yearv" value='{{$stud_details[0]->Year}}' readonly></p>
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
    
    @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==3)
      <tr>
          <td>{{$complaint[$i]->comp_no}}</td>
          <td>{{$complaint[$i]->labno}}</td>
          <td>{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td>
          </td>
      </tr>
      @endif
          
    @endfor
     
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
        
        @for ($i=0;$i<$complaint->count();$i++)
        @if($complaint[$i]->status!=3)
        <tr>
          <td>{{$complaint[$i]->comp_no}}</td>
          <td>{{$complaint[$i]->labno}}</td>
          <td>{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td>
          @if ($complaint[$i]->status==0)
            Not yet Approved
          @elseif ($complaint[$i]->status==1)
            Yet to be configured by admin
          @else
            Underprocess
          @endif
          </td>
        </tr>
        @endif
        
        @endfor
        

        
      </table>
   
</div>

<div class="footer">
  <p>footer</p>

</div>

    <script src="js/filecomplaint.js"></script>
    





</body>
</html> 


