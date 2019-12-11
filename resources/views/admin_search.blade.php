
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
</style>

<body>
	<div class="container">
		<form action="/search" method="POST" role="search">
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
		<div class="container">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>Sample User details</h2>
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
						<td>{{$complaint->comp_no}}</td>
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
	<!-- <form action="/admin_home"> -->
    <button class="btn btn-primary" onclick="window.location.href = '/admin_home';" style="width:15%;">Back</button>
	<!-- </form> -->
    </center>

</body>
</html>