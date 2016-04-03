<!--
This page handles the following steps:

User action							Inputtyp								Business logic
3. Välj recitation 					(dropdown/radio buttons)				Get vilka uppgifter som finns att göra
4. Välj grupp 						(dropdown/radio buttons)
-->

<!DOCTYPE html>
<html>
<head>
	<title>Recitation submission</title>
	<link rel="stylesheet" type="text/css" href="lab2.css">
</head>

<body>

<div class="infotext">
	<p>
		Welcome <?php echo $_POST["sid"]; ?><br>
		You're inputting for course: <?php echo $_POST["cid"]; ?>
	</p>
</div>

<div class="form">
	<form action="third.php" method="post">
	What recitation? <br>
	<select name="rid">
	  <option value="">Select...</option>
	  <option value="1">rec#1</option>
	  <option value="aso">aso</option>
	</select>
	</p>

	<p>
	What group? <br>
	<select name="gid">
	  <option value="">Select...</option>
	  <option value="A">A</option>
	  <option value="B">B</option>
	</select>
	</p>

	<input type="submit">
	</form>
</div>

</body>

</html>