<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delete System</title>

<style>
body {
	font-family: Arial, Helvetica, sans-serif;
	background: ;
}

* {
	box-sizing: border-box;
}

.container {
  width: 50%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

h3 {
	font-family: 'Courier new', sans-serif;
}

select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
</head>
<body>

<center>
<br><br>
<h3>Delete System Record</h3>
<br>

<div class="container">
<form action="#">

<label for="labno">Please select the Lab</label>
<select id="lab" name="labno" required>
      <option value="">Lab:</option>
      <option value="513">513</option>
      <option value="516A">516A</option>
      <option value="516B">516B</option>
      <option value="517">517</option>
      <option value="518">518</option>
      <option value="519">519</option>
</select>
<br><br>

<label for="systemno">Please select the System</label>
<select id="system" name="systemno" required>
      <option value="">System:</option>
      <option value="A-1">A-1</option>
      <option value="A-2">A-2</option>
      <option value="A-3">A-3</option>
      <option value="A-4">A-4</option>
      <option value="A-5">A-5</option>
      <option value="A-6">A-6</option>
      <option value="A-7">A-7</option>
      <option value="A-8">A-8</option>
</select>

<input type="submit" value="Submit">
</form>
</div>
</center>

</body>
</html> 
