<!--
This page handles the following steps:

User action							Inputtyp								Business logic
3. Välj recitation 					(dropdown/radio buttons)				Get vilka uppgifter som finns att göra
4. Välj grupp 						(dropdown/radio buttons)
-->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recitation submission</title>
	<link rel="stylesheet" type="text/css" href="lab.css">
</head>

<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>

<div class="infotext">
	<?php
	$studentid = $_SESSION['studentid'];
	$courseid = $_SESSION['courseid'];
	if(isset($studentid) && isset($courseid)){
		echo "Welcome " . $studentid;
		echo "<br>You are inputting for " . $courseid . " class";
	}
		else{echo "is not set, probs undefined index error";}
	?>
</div>

<br>

<div class="form">
	<form action="script.php" method="post">
		<div class="input">
			What recitation? <br>
				<?php
					echo "<select name='rId'>";
					$result = mysqli_query($conn, "SELECT DISTINCT rId FROM (SELECT rId, cId FROM recitation WHERE cId='$courseid')a") or die(mysql_error());
					while ($row = mysqli_fetch_assoc($result)) {
					    echo "<option value='" . $row['rId'] . "'>" . $row['rId'] . "</option>";
					}
					echo "</select>";
				?>
		</div>

		<div class="input">
			What group? <br>
				<?php
					echo "<select name='gId'>";
					$result2 = mysqli_query($conn, "SELECT gId FROM recitationgroups WHERE cId='$courseid'") or die(mysql_error());
					while ($row = mysqli_fetch_assoc($result2)) {
					    echo "<option value='" . $row['gId'] . "'>" . $row['gId'] . "</option>";
					}
					echo "</select>";
				?>
		</div>

		<div class="submit">
			<input type="submit" name="submit2">
		</div>
	</form>
</div>

</body>

</html>