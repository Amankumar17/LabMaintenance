<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
</head>
<body>
<div>
<table>
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
      Roll No.
    </th>
    <th>
      SDRN
    </th>        
    <th>
      Description
    </th>
    <th>
      Status
    </th>  
    <th>
      Created At
    </th>  
    <th>
      Updated At
    </th>   
    
    @for($i=0;$i<$complaint->count();$i++)

      
      <tr>
          <td>{{$complaint[$i]->comp_no}}</td>
          <td>{{$complaint[$i]->labno}}</td>
          <td>{{$complaint[$i]->sysno}}</td>
          @if($complaint[$i]->rollno=='NULL')
          <td>-</td>
          @else
          <td>{{$complaint[$i]->rollno}}</td>
          @endif          
          <td>{{$complaint[$i]->sdrn}}</td>
          <td>{{$complaint[$i]->description}}</td>
          <td>{{$complaint[$i]->created_at}}</td>
          <td>{{$complaint[$i]->updated_at}}</td>
      </tr>
      
          
    @endfor
     
  </table>
</div>
</body>
</html>