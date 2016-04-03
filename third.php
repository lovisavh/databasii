<!--
This page handles the following steps:

User action							Inputtyp								Business logic
5. Submit gjorda uppgifter 			(rutor)									Post?
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
		You're inputting for recitation <?php echo $_POST["rid"]; ?> and group <?php echo $_POST["gid"]; ?>
	</p>
</div>

<div class="form">
	<form action="fourth.php" method="get">

	Please tick solved problems <br>
	<input type="checkbox" name="test" value="value1">

	<p>
	<input type="submit">
	</form>
</div>


</body>

</html>