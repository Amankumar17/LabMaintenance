<!DOCTYPE html>
<html>
<head>
<title>Search functionality - justLaravel.com</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
      <li><a href="/admin_home">Home</a></li>
      <li><a href="/admin_search">Search</a></li>
      <li><a href="/admin_deadstock">Deadstock</a></li>
      <li><a href="/system_logs">System Logs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/testlogin"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav>

	<div class="container">
		
		<br><br>
		<form action="/search_action" method="POST" role="search">

			<div class="selectLabNo">
    			<label>Select Action:</label>
    			<select id="lb" name="action" required style="width:150px;margin-left:2%;">
                    <option value="" disabled selected>Select</option>
            		<option value="add">Add logs</option>
                    <option value="remove">Remove logs</option>
                    <option value="transfer">Transfer logs</option>
                    <option value="all">All logs</option>
    			</select>
				<button type="submit" class="btn btn-primary" style="width:100px;margin-left:2%;padding:2px;">
					GO
				</button>
  			</div>
		</form>

		<div class="container">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>System Transfer Logs</h2>
			<table class="table table-striped table-responsive">
				<thead>
					<tr>
                        <th>Sr No</th>
						<th>Labno</th>
						<th>Sysno</th>
                        <th>Labno</th>
						<th>Sysno</th>
                        <th>Admin</th>
						<th>Action</th>
                        <th>Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $complaint)
					<tr>
						<td>{{$complaint->srno}}</td>
						<td>{{$complaint->lab_source}}</td>
						<td>{{$complaint->sysno_source}}</td>
                        <td>{{$complaint->lab_target}}</td>
						<td>{{$complaint->sysno_target}}</td>
                        <td>{{$complaint->admin}}</td>
						<td>{{$complaint->action}}</td>
                        <td>{{$complaint->Date}}</td>
					</tr>
					</form>
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>

    <center>
	<!-- <form action="/admin_home"> -->
    <button class="btn btn-primary" onclick="window.location.href = '/admin_home';">Back</button>
	<!-- </form> -->
    </center>

</body>
</html>