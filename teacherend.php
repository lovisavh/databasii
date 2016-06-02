<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "db");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recitation submission</title>
	<link rel="stylesheet" type="text/css" href="lab.css">
</head>

<body>

	<div class="infotext">
			Thank you <?php echo $_SESSION['teacherid']?>
	</div>

	<div class='form'>
		<form action="script.php" method="post">
			<div class="submit2">
				<input type="submit" name="home2" value="End session">
			</div>
		</form>
	</div>

</body>

</html>