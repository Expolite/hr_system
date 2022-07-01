<?php 
	session_start();
	include "db_conn.php"; // Connection 
	// user id and user role
	if(isset($_SESSION['id']) && isset($_SESSION['role'])) { 
		$usrID = $_SESSION['id']; // account ID
		$usr_IDNmbr = isset($_SESSION['id_num']); // id number
		$usrRole = $_SESSION['role']; // user role
		// if user role is equal to admin -> continue
								//  else -> back to login form
		if($usrRole === "admin"){
			// do nothing
		}elseif($usrRole === "user"){ // if role is user
			// goto to user home page
			header("location: test.php");
		}else{
			header("location: index.php");
		}

	}else {
		header("Location: index.php"); // back to login form
	}


	// query of account database
	$accnts_sql = "SELECT fname FROM hr_accounts WHERE id = '$usrID'"; 
	$accnts_res = mysqli_query($conn, $accnts_sql);
	// get the user First Name
	if (mysqli_num_rows($accnts_res) > 0){
		while ($accnts_row = mysqli_fetch_assoc($accnts_res)){
			$fname = $accnts_row['fname'];
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin page</title>

	<!-- icon titlebar -->
	<link rel="shortcut icon" href="img/main/logo.jpeg" type="image/x-icon">
	<!-- main -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- navbar -->
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<!-- admin -->
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>


<!-- NAVBAR -->
<?php include "assets/navbar.php"; ?>


<!-- contents -->

<div class="admin_control_container">
<div class="admin_control_container_2">
	<!--  box -->
	<div class="admin_box border border-secondary rounded bg-light shadow" onclick="window.location.href = 'work_eva.php';">
		<!-- icon -->
		<div class="admin_panel">
		<img src="img/main/evaluation.png">
		</div>
		<div align="left" class="admin_panel_title">
		<br>
		<a href="work_eva.php">Work Evakuation</a>
		</div>
	</div>

	<!--  box -->
	<div class="admin_box border border-secondary rounded bg-light shadow" onclick="window.location.href = 'attend.php';">
		<!-- icon -->
		<div class="admin_panel">
		<img src="img/main/attend.png">
		</div>
		<div align="left" class="admin_panel_title">
		<a href="attend.php">Attendance Monitoring</a>
		</div>
	</div>

	<!--  box -->
	<div class="admin_box border border-secondary rounded bg-light shadow" onclick="window.location.href = 'work_assessment.php';">
		<!-- icon -->
		<div class="admin_panel">
		<img src="img/main/assign.png">
		</div>
		<div align="left" class="admin_panel_title">
		<a href="work_assessment.html">Status of Work Assignment</a>
		</div>
	</div>

</div>
</div>










<!--main function-->
<script type="text/javascript" src="js/main.js"></script>
<!--bootstrap js-->
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

<!-- FOOTER -->
<?php include "assets/myfooter.php"; ?>

</html>