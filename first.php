<!--
This page handles the following steps:

User action			Inputtyp								Business logic
1. Ge studentid		(sträng)
2. Välj kurs		(från dropdown/radio buttons)			Get vilka recitations + grupper som finns
 -->

<!DOCTYPE html>
<html>
<head>
	<title>Recitation submission</title>
	<link rel="stylesheet" type="text/css" href="lab2.css">
</head>

<body>

<div class="infotext">
	<p>Welcome!</p>
</div>

<!-- form data sent with get method to second.php -->
<div class="form">
	<form action="second.php" method="post">

	Student id <br>
	<input type="text" name="sid">

	<p>
	What course? 
	<br>

	<select name="cid">
	  <option value="">Select...</option>
	  <option value="hi">Courseid</option>
	</select>
	</p>

	<input type="submit">
	</form>
</div>

</body>

</html>