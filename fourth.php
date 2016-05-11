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
			Thank you! <br>
			Please note that when you have submitted your checks, <br>
			you can add more of them for a given recitation, <br>
			but not remove or alter the ones already submitted. <br>
	</div>

	<?php
	$studentid = $_SESSION['studentid'];
	$courseid = $_SESSION['courseid'];
	$recitationid = $_SESSION['recitationid'];
	$problemid = $_SESSION['pId'];

	$query = "SELECT COUNT(problem) as solved FROM (
				SELECT problem, subcount FROM ( 
					SELECT  recitationrecord.pId as problem, 
    						COUNT(recitationrecord.pId) as subcount, 
    						problem.nrHave2Solve as cond
					FROM recitationrecord 
					INNER JOIN problem 
					ON recitationrecord.pId = problem.pId 
					WHERE recitationrecord.sId = '$studentid' AND recitationrecord.rId = '$recitationid' 
					GROUP BY recitationrecord.pId)a 
				WHERE a.subcount >= cond)b";
	$row = mysqli_fetch_assoc(mysqli_query($conn, $query));
	$_SESSION['countsolved'] = $row['solved'];

	echo "User " . $studentid . " has solved (" . $_SESSION['countsolved'] . ") problems for recitaton " . $recitationid . "!";

	//session_unset();
	//session_destroy();
	?>

</body>

</html>