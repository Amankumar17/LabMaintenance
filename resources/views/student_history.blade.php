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
      
      <!-- <form action="/studenthistory_to_feedback">
        <button type="submit" class="student_headerbuttons" name="rollno" value='{{$stud_details[0]->Roll_no}}'> Home</button>
      </form> -->
      
      <!-- <form action="/feedback">
      <button type="submit" class="student_headerbuttons">Home</button>
      </form>

      <form action="/student_history">
      <button type="submit" class="student_headerbuttons">History</button>
      </form>
   
      <form action="/testlogin">
        <button type="submit" class="student_headerbuttons">Logout</button>
      </form> -->
    
      <button type="button" class="student_headerbuttons student_headerbuttons1" onclick="window.location.href = '/feedback';">Home</button>

      <button type="button" class="student_headerbuttons student_headerbuttons2" onclick="window.location.href = '/student_history';">History</button>

      <button type="button" class="student_headerbuttons student_headerbuttons3" onclick="window.location.href = '/testlogin';">Logout</button>


    </div>
    <br>
<div>

<button class="student_select" onclick="openPage('News', this, '#c88380')" id="defaultOpen"><b>Complaints In Progress</b></button>
<button class="student_select" onclick="openPage('Home', this, '#c88380')"><b>Solved Complaints</b></button>


<br>
<div id="Home" class="complaintinfo">
  <table id="myTable" cellpadding="10">
    <th>
      Srno
    </th>
    <th>
      Floor
    </th>
    <th>
      Labno
    </th>
    <th>
      System
    </th>
    <th>
      Description
    </th>
    <th>
      Date
    </th>
       
    @for ($i=0;$i<$complaint->count();$i++)
      @if($complaint[$i]->status==3)
      <tr>
          <td width="8%">{{$complaint[$i]->comp_no}}</td>
          <td width="8%">{{$complaint[$i]->floor}}</td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="8%">{{$complaint[$i]->sysno}}</td>
          <td >{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->created_at)) }}</td>
      </tr>
      @endif
          
    @endfor
     
  </table>
</div>

<div id="News" class="complaintinfo">
    <table id="myTable" cellpadding="10">
    
    <th >
      Srno
    </th>
    <th>
      Floor
    </th>
    <th>
      Labno
    </th>
    <th>
      System
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
        @if($complaint[$i]->status!=3)
        <tr>
          <td width="8%">{{$complaint[$i]->comp_no}}</td>
          <td width="8%">{{$complaint[$i]->floor}}</td>
          <td width="8%">{{$complaint[$i]->labno}}</td>
          <td width="10%">{{$complaint[$i]->sysno}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td> {{date('d M, Y', strtotime($complaint[$i]->created_at)) }}</td>

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



</div>
<script src="js/filecomplaint.js"></script>
</body>
</html>  