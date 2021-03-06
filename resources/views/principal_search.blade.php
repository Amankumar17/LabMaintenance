<!DOCTYPE html>
<html>
<head>
<title>Search functionality - justLaravel.com</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<style>
.container {
    margin: 5%;
}

.btn {
	width:15%;
	min-width: 100px;
}
.navbar{
	border-radius:0px;
}
</style>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid" id="myHeader">
    <div class="navbar-header">
      <a class="navbar-brand">Dy Patil RAIT</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/principal_home">Home</a></li>
      <li><a href="/principal_search">Search</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/testlogin"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav>

	<div class="container">
		<form action="/principalsearch" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search users"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		<br><br>

		<p><b>Enter the floor number and lab number for custom search:</b></p>
		<form action="/principalsearchLab" method="POST" role="search">
			<select id="lb" name="labno" required style="width:200px;height:25px;" onchange="labsearch(this.value)">
				<option value="" disabled selected>Select</option>
					@for($i=0; $i<$floor->count(); $i++)
						<option >{{$floor[$i]->floor}}</option>
					@endfor
			</select>
			<br><br>

			<select id="syst" name="labno" style="width:200px;height:25px;">
					
				<option value="" disabled selected>Select</option>
					
			</select>

			<br><br>

			<button type="submit" class="btn btn-primary" style="width:100px;margin-left:2%;padding:2px;">
					GO
			</button>
		</form>

		<div class="container">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>Complaint details</h2>
			<table class="table table-striped">
				<thead>
					<tr>
                        <th>Comp No</th>
						<th>Labno</th>
						<th>Sysno</th>
                        <th>Roll No</th>
						<th>Sdrn</th>
                        <th>Problem</th>
						<th>Desciption</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $complaint)
					
					<tr>
						<td><input type="text" style="width:100px;text-align:center;border:none;" name="comp_no" value="{{$complaint->comp_no}}" readonly></td>
						<td>{{$complaint->labno}}</td>
						<td>{{$complaint->sysno}}</td>
                        <td>{{$complaint->rollno}}</td>
						<td>{{$complaint->sdrn}}</td>
                        <td>{{$complaint->problem}}</td>
						<td>{{$complaint->description}}</td>
					</tr>
					
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>

    <center>
	
    <button class="btn btn-primary" onclick="window.location.href = '/principal_home';">Back</button>
	
    </center>

	<script>
  function labsearch(value) {
	console.log(value);
	if (value.length==0) {
	  document.getElementById("syst").innerHTML = '<option value="" disabled selected>Select</option>';
	  
      }
    else {
      var obj = <?php echo json_encode($systems); ?>;
      var arr=[];

      for(a in obj) {
        arr.push(obj[a])
      }

      var cont='<option value="" disabled selected>Select</option>';

      for(i=0; i<arr.length; i++) {
        if(arr[i].floor == value) {
          cont = cont + "<option>" + arr[i].labno + "</option>";
        }
      }
      document.getElementById('syst').innerHTML = cont;
    }
    return 0;
  }

  </script>


</body>
</html>