<!--
This page handles the following steps:

User action			Inputtyp								Business logic
1. Ge studentid		(sträng)								type id, kolla om finns i databas, annars inte registrerad
2. Välj kurs		(från dropdown/radio buttons)			Get vilka recitations + grupper som finns
 -->
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recitation submission</title>
	<link id="pagestyle" rel="stylesheet" type="text/css" href="lab.css">
	<script>
		function swapStyleSheet(sheet){
		document.getElementById('pagestyle').setAttribute('href', sheet);
		}
	</script>
</head>

<body>
<div class="infotext">
	<h2>Welcome!</h2><br>
	<img src="crest.gif" style="width:200px" onclick="swapStyleSheet('gryff.css')"><br><br>
</div>

<div class="form">
	<form action="script.php" method="post">
		<div class="submit">
			<input name="teacher" type="submit" value="I am a teacher →">
			<input name="student" type="submit" value="I am a student →">
		</div>
	</form>
</div>

</body>

</html>