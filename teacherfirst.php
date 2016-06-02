
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
			Teacher id? <br>
				<?php
					echo "<select name='assistID'>";
					$result = mysqli_query($conn, "SELECT DISTINCT assistID FROM assistant") or die(mysql_error());
					while ($row = mysqli_fetch_assoc($result)) {
					    echo "<option value='" . $row['assistID'] . "'>" . $row['assistID'] . "</option>";
					}
					echo "</select>";
				?>
		</div>

		<div class="submit">
			<input name="submitteacher" type="submit">
		</div>
	</form>
</div>

</body>

</html>