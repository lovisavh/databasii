<!--
This page handles the following steps:

User action							Inputtyp								Business logic
5. Submit gjorda uppgifter 			(rutor)									Post?
 -->
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
	$studentid = $_SESSION['studentid'];
	$courseid = $_SESSION['courseid'];
	$recitationid = $_SESSION['recitationid'];
	$groupid = $_SESSION['groupid'];
	if(isset($recitationid) && isset($groupid)){
		echo "User " . $studentid . " is inputting for recitation " . $recitationid;
		echo "<br>" . $groupid . ", " . $courseid;
	}
		else {echo "is not set, probs undefined index error";}
	?>
</div>

<div class="form">
	<form action="script.php" method="post">

	<div class="input">
		Please tick solved problems:<br><br>
			<?php
				//$problems = mysqli_query($conn, "SELECT pId FROM (SELECT pId, rId FROM problem WHERE rId='$recitationid')a");
				$subproblems = mysqli_query($conn, "SELECT pId, subname FROM (SELECT subname, pId, rId FROM subproblem WHERE rId='$recitationid')b");

 				//while ($row = mysqli_fetch_assoc($subproblems)){
				foreach ($subproblems as $row) {			
					echo '<label>' . $row['pId'] . $row['subname'] . '</label>' .
					'<input type="checkbox" name="problems[]" value='.$row['pId'].$row['subname'].'><br>';
				}
			?>
	</div>

	<div class="submit">
		<input type="submit" name="submit3">
	</div>
	</form>
</div>


</body>

</html>