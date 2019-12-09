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
    <p>Name: <input type="text" name="namev" value='{{$fac_details[0]->First_name}} {{$fac_details[0]->Middle_name}} {{$fac_details[0]->Last_name}}' readonly></p>
    <p>sdrn no.: <input type="text" name="sdrnv" value='{{$fac_details[0]->Sdrn}}' readonly></p>
    <p>designation :<input type="text" name="divisionv" value='{{$fac_details[0]->Desig}}'readonly></p>

  </div>

  <div class="newcomplaint">
      <a class="a1" href="/teacher_com">new complaint</a>
  </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

<button class="select" onclick="openPage('solved', this, '#4CAF50')" id="defaultOpen"><b>solved complaints</b></button>
<button class="select" onclick="openPage('ongoing', this, '#4CAF50')" ><b>ongoing complaints</b></button>
<button class="select" onclick="openPage('stud_confirmation', this, '#4CAF50')" ><b>students confirmations</b></button>
<button class="select" onclick="openPage('stud_confirmed', this, '#4CAF50')" ><b>students confirmed</b></button>


<div id="solved" class="complaintinfo">
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
      @if($complaint[$i]->status==3 && $complaint[$i]->rollno=="NULL")
      <tr>
          <td>{{$complaint[$i]->comp_no}}</td>
          <td>{{$complaint[$i]->labno}}</td>
          <td>{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td>
          Solved
          </td>
      </tr>
      @endif
          
    @endfor
    
<!-- 
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
    </tr> -->
  </table>
</div>

<div id="ongoing" class="complaintinfo">
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
      @if(($complaint[$i]->status==1 || $complaint[$i]->status==2) && $complaint[$i]->rollno=="NULL")
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
<!--     
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
         -->
      </table>
   
</div>


<div id="stud_confirmation" class="complaintinfo">
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
    
        @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==0 && $complaint[$i]->rollno!="NULL")
      <tr>
          <td>{{$complaint[$i]->comp_no}}</td>
          <td>{{$complaint[$i]->labno}}</td>
          <td>{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->rollno}}</td>
          <td>TE</td>
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
    
<!-- 
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
         -->
      </table>
  
</div>
  
<div id="stud_confirmed" class="complaintinfo">
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
    
        @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status>0 && $complaint[$i]->rollno!="NULL")
      <tr>
          <td>{{$complaint[$i]->comp_no}}</td>
          <td>{{$complaint[$i]->labno}}</td>
          <td>{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->rollno}}</td>
          <td>TE</td>
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
    
<!-- 
        <tr>
          <td>1</td>
          <td>516-A</td>
          <td>20</td>
          <td>17CE2032</td>
          <td>TE</td>
          <td>Mouse</td>
          <td>confirmed234</td>
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
         -->
      </table>
  
     
</div>


<div class="footer">
  <p>footer</p>

</div>



<script src="js/filecomplaint.js"></script>



</body>
</html> 


