
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
	<?php
	if(isset($_SESSION['teacherid'])){
		$teacherid = $_SESSION['teacherid'];
		echo "Welcome " . $teacherid;
	}
		else {echo "is not set, probs undefined index error";}
	?>
</div>

<div class="form">
	<form action="script.php" method="post">

	<div class="input">
		Please mark students who have shown their solutions on the board. <br><br>
			<?php
				$students = mysqli_query($conn, "SELECT DISTINCT sId FROM (
												    SELECT sId, recitationrecord.cId, assistID
													FROM recitationrecord
													JOIN assistant
													ON recitationrecord.cId=assistant.cId
													WHERE assistant.assistID='$_SESSION[teacherid]')a");


				foreach ($students as $row) {			
					echo '<label>' . $row['sId'] . '</label>' .
					'<input type="checkbox" name="students[]" value='.$row['sId'].'><br>';
				}
			?>
	</div>

	<div class="submit">
		<input type="submit" name="teachermark">
	</div>
	</form>
</div>


</body>

</html>