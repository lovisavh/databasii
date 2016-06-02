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
	<style type="text/css">body, a:hover {cursor: url(http://cur.cursors-4u.net/user/use-1/use160.cur), progress !important;}</style><a href="http://www.cursors-4u.com/cursor/2011/02/06/harry-potter-magical-wand.html" target="_blank" title="Harry Potter Magical Wand"><img src="http://cur.cursors-4u.net/cursor.png" border="0" alt="Harry Potter Magical Wand" style="position:absolute; top: 0px; right: 0px;" /></a>
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
			<input name="teacher" type="submit" value="I am a teacher">
			<input name="student" type="submit" value="I am a student">
		</div>
	</form>
</div>

</body>

</html>