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
	<link rel="stylesheet" type="text/css" href="lab.css">
</head>

<body>
<div class="infotext">
	Welcome!
</div>

<div class="form">
	<form action="script.php" method="post">
		<div class="input">
			Student id? <br> (Note: Case sensitive input) <br>
			<input name="sId" type="text">
		</div>

		<div class="input">
			What course? <br>
				<?php
					echo "<select name='cId'>";
					$result = mysqli_query($conn, "SELECT DISTINCT cId FROM pickcourse") or die(mysql_error());
					while ($row = mysqli_fetch_assoc($result)) {
					    echo "<option value='" . $row['cId'] . "'>" . $row['cId'] . "</option>";
					}
					echo "</select>";
				?>
		</div>

		<div class="submit">
			<input name="submit1" type="submit" value="Next page">
		</div>
	</form>
</div>

</body>

</html>