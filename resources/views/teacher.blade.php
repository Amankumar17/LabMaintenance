<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <title>Student Complaint</title>
   <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/student_history_style.css">
      
</head>
<body>

<div class="contact-form">
   <div>
      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/teacher_feedback';">&#x26F7; AddComplaints</button>
      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/teacher';">DashBoard</button>
      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/testlogin';">Logout</button>
   </div> 
    <br>
<div>

<button class="selectforteacher" onclick="openPage('solved', this, '#4CAF50')"><b>Solved Complaints</b></button>
<button class="selectforteacher" onclick="openPage('ongoing', this, '#4CAF50')" ><b>Complaints In Progress</b></button>
<button class="selectforteacher" onclick="openPage('stud_confirmation', this, '#4CAF50')" id="defaultOpen"><b>New Complaints to Confirm</b></button>
<button class="selectforteacher" onclick="openPage('stud_confirmed', this, '#4CAF50')" ><b>Students Complaints</b></button>


<div id="solved" class="complaintinfo">
  <table id="myTable" cellpadding="10">
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
          <td width="8%">{{$complaint[$i]->comp_no}}</td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="10%">{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td width="8%">
          Solved
          </td>
      </tr>
      @endif
          
    @endfor

  </table>
</div>

<div id="ongoing" class="complaintinfo" >
    <table id="myTable" cellpadding="10">
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
          <td width="8%">{{$complaint[$i]->comp_no}}</td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="10%">{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td width="8%">
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


<div id="stud_confirmation" class="complaintinfo">
    <table id="myTable" cellpadding="10">
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
      <form action="/teacher_confirm" method="POST">
      <tr>
          <td width="8%"><input type="text" style="background-color:#dddddd;font-size:17px;text-align:center;" name="comp_no" value="{{$complaint[$i]->comp_no}}" readonly></td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="10%">{{$complaint[$i]->sysno}}</td>
          <td width="8%">{{$complaint[$i]->rollno}}</td>
          <td width="8%">TE</td>
          <td>{{$complaint[$i]->description}}</td>
          <td width="8%">
          <input type="submit" name="Confirm" value="Confirm" />
          <input type="submit" name="Reject" value="Reject" />
          </td>
      </tr>
      </form>
      @endif
          
    @endfor
    
      </table>
  
</div>
  
<div id="stud_confirmed" class="complaintinfo">
    <table id="myTable" cellpadding="10">
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
          <td width="8%">{{$complaint[$i]->comp_no}}</td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="10%">{{$complaint[$i]->sysno}}</td>
          <td width="8%">{{$complaint[$i]->rollno}}</td>
          <td width="8%">TE</td>
          <td>{{$complaint[$i]->description}}</td>
          <td width="8%">
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
<script src="js/filecomplaint.js"></script>
</body>
</html>  