<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

		<link rel="stylesheet" href="css/hod_options.css">
		<title>Report Generation</title>
	</head>

	<body>
		<center>

		<br>
		<p>Please select the necessary details to generate the Report</p>

		<div class='forms'>
			<form action="/report" method="POST">

				<div class='box'>
					<h4>Select the type of complaints</h4>
					<select name="status" required>
						<option value="" disabled selected>Select</option>
						<option value="1">All</option>
						<option value="2">Underprocess</option>
						<option value="3">Completed</option>
					</select>
				</div>

				<br>

				<div class='box'>
					<h4>Select the start date</h4>
					<input type="date" name="start" required>
				</div>

				<br>
				
				<div class='box'>
					<h4>Select the end date</h4>
					<input type="date" name="end" required>
				</div>
				
				<br>

				<div class='box'>
					<h4>Select the sort by</h4>
					<select name="order" required>
						<option value="" disabled selected>Select</option>
						<option value="comp_no">Complaint no</option>
						<option value="labno">Lab</option>
						<option value="problem">Problem</option>
						<option value="created_at">Date</option>
					</select>
				</div>

				<br>
				<input class="btn btn-success" type="submit" value="Generate">	
			</form>
		</div>

		<button class="btn btn-primary" onclick="window.location.href = '/hod_home';">Back</button>
		</center>
		<br><br><br>
	</body>
</html>