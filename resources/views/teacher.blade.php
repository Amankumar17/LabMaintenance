<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <title>Faculty Home</title>
   <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/teacher.css">
      
</head>
<body>

<div class="contact-form">
   <div>
      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/teacher_feedback';">Add Complaints</button>
      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/teacher';">Dashboard</button>
      <button type="button" class="student_headerbuttons" onclick="window.location.href = '/testlogin';">Logout</button>
   </div> 
    <br>
<div>

<button class="student_select" onclick="openPage('solved', this, '#c88380')"><b>Solved <br>Complaints</b></button>
<button class="student_select" onclick="openPage('ongoing', this, '#c88380')" ><b>Complaints <br>In Progress</b></button>
<button class="student_select" onclick="openPage('stud_confirmation', this, '#c88380')" id="defaultOpen"><b>New Complaints <br>to Confirm</b></button>
<button class="student_select" onclick="openPage('stud_confirmed', this, '#c88380')" ><b>Students<br> Complaints</b></button>


<div id="solved" class="complaintinfo">
  <table id="myTable" cellpadding="10">
  <th>
      Srno
    </th>
    
    <th>
      Labno
    </th>
    <th>
      System
    </th>
    <th>
      Problem
    </th>
    <th>
      Description
    </th>
    <th>
      Date
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
          <td width="8%">{{$complaint[$i]->problem}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->created_at)) }}</td>
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
        Srno
      </th>
      <th>
        Labno
      </th>
      <th>
        System
      </th>
      <th>
          Problem
      </th>
      <th>
        Description
      </th>
      <th>
        Date
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
          <td width="8%">{{$complaint[$i]->problem}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->created_at)) }}</td>

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
          Srno
        </th>
        
        <th>
          Labno
        </th>
        <th>
          System
        </th>
        <th>
          Roll no.
        </th>
        <th>
          Problem
        </th>
        <th>
          Description
        </th>
        <th>
          Date
        </th>
        <th>
          Confirm
        </th>
        <th>
          Reject
        </th> 
        
        @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==0 && $complaint[$i]->rollno!="NULL")
      <form action="/teacher_confirm" method="POST">
      <tr>
          <td width="8%"><input type="text" style="background-color:#dddddd;border:none;font-size:17px;text-align:center;" name="comp_no" value="{{$complaint[$i]->comp_no}}" readonly></td>
        

          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="10%">{{$complaint[$i]->sysno}}</td>
          <td width="8%">{{$complaint[$i]->rollno}}</td>
          <td width="8%">{{$complaint[$i]->problem}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->created_at)) }}</td>

          <td>
          <input type="submit" name="Confirm" value="Confirm" /></td>
          <td>
          <button onclick="openReject()">Reject</button>
          <!-- <input type="submit" name="Reject" value="Reject" /> -->
    
          <div class="form-popup" id="RejectBox" >

              <label><b>Justification for rejection of complaint of {{$complaint[$i]->rollno}}:</b></label><br>
              <textarea  rows="5" cols="40" name="justification" ></textarea><br><br>

              <input type="submit" name="Reject" value="Reject" />
              <button type="button" onclick="closeReject()">Close</button>
 
          </div>
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
          Srno
        </th>
        <th>
          Labno
        </th>
        <th>
          System
        </th>
        <th>
          Roll no.
        </th>
        <th>
          Problem
        </th>
        <th>
          Description
        </th>
        <th>
          Date
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
          <td width="8%">{{$complaint[$i]->problem}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->created_at)) }}</td>

          <td width="8%">
          @if ($complaint[$i]->status==1)
            Yet to be configured by admin
          @elseif($complaint[$i]->status==2)
            Underprocess
          @else
            Completed
          @endif
          </td>
      </tr>
      @endif
          
    @endfor
    
      </table>
  
     
</div>
<script src="js/filecomplaint.js"></script>

<script>

function openReject() {
  document.getElementById("RejectBox").style.display = "block";
}

function closeReject() {
  document.getElementById("RejectBox").style.display = "none";
}

</script>

</body>
</html>  