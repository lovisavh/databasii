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

	//choosing student
	if(isset($_POST['student'])) {
		header("Location: http://localhost/my-site/otherfirst.php");

	//chosing teacher
	} elseif (isset($_POST['teacher'])) {
		header("Location: http://localhost/my-site/teacherfirst.php");

// ---------------------------- student gui ----------------------------

	// submitting studentid and courseid
	} elseif(isset($_POST['submit1'])) {
			$studentid = trim($_POST['sId']);
			$courseid = $_POST['cId'];

			if($studentid!==''){
				// if no record of sid cid combo already exists:
				$sql = "INSERT IGNORE INTO pickcourse (sId, cId) VALUES ('$studentid','$courseid')";
				if (mysqli_query($conn, $sql)) {;
				    $_SESSION['studentid'] = $studentid;
				    $_SESSION['courseid'] = $courseid;
				    header("Location: http://localhost/my-site/second.php");
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn); //sql error om conn inte funkar
				}
			} else {
				// felhantering om inget studentid givet
				echo "Error: No name input. Go back and try again!";
			}

	// submitting recitationid and groupid
	} elseif(isset($_POST['submit2'])) {
		$_SESSION['recitationid'] = $_POST['rId'];
		$_SESSION['groupid'] = $_POST['gId'];
		header("Location: http://localhost/my-site/third.php");

	// 
	} elseif(isset($_POST['submit3'])) {
		//getting problems for the current recitation NOT USED
		//$problemid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT pId FROM ( 
		//														 SELECT pId, rId FROM problem WHERE rId='$_SESSION[recitationid]')a"));
		//$_SESSION['pId'] = $problemid;

		//the subproblems that the user have checked
		if(isset($_POST['problems'])){
			$problems = $_POST['problems'];
			$_SESSION['problems'] = $problems;
			
			// recording solved problems+subproblems into recitationrecord for the student in recitationrecord
			for($i=0; $i<count($problems); $i++){
				$printprob = $problems[$i];
				$substr = substr($printprob,0,-1);
				$qry = "INSERT IGNORE INTO RecitationRecord (rId, problem, pId, sId, cId) 
						VALUES ('$_SESSION[recitationid]', '$printprob', '$substr',
								'$_SESSION[studentid]', '$_SESSION[courseid]')";
				mysqli_query($conn, $qry);
			}

			header("Location: http://localhost/my-site/fourth.php");

		} else {
			//felhantering
			echo "It looks as if you did not submit any checks. Please try again!";
		}

	} elseif (isset($_POST['home'])) {
		// recording the number of solved problems (not subproblems!) for the student and given recitation in student
		$query1 = "INSERT INTO student (sId, shown, rId, recitationresult) 
					   VALUES ('$_SESSION[studentid]', '0', '$_SESSION[recitationid]', '$_SESSION[countsolved]')
					   ON DUPLICATE KEY UPDATE recitationresult='$_SESSION[countsolved]'";
		$add1 = mysqli_query($conn, $query1);
		mysqli_fetch_assoc($add1);
		session_unset();
		session_destroy();
		header("Location: http://localhost/my-site/veryfirst.php");

// ---------------------------- teacher gui ----------------------------

	} elseif (isset($_POST['submitteacher'])) {
		$teacherid = $_POST['assistID'];
		$_SESSION['teacherid'] = $teacherid;
		header("Location: http://localhost/my-site/teachersecond.php");

	} elseif (isset($_POST['teachermark'])) {
		if(isset($_POST['students'])){
			$students = $_POST['students'];
			$_SESSION['students'] = $students;

			for($i=0; $i<count($students); $i++){
				$student = $students[$i];
				$qry = "UPDATE student
						SET shown='1'
						WHERE sId='$student'";
				mysqli_query($conn, $qry);
			}

			header("Location: http://localhost/my-site/teacherend.php");
		}

	}	elseif (isset($_POST['home2'])) {
		session_unset();
		session_destroy();
		header("Location: http://localhost/my-site/veryfirst.php");
	}

?>