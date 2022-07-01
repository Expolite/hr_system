
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Work Evaluation</title>

	<!-- icon titlebar -->
	<link rel="shortcut icon" href="img/main/logo.jpeg" type="image/x-icon">
	<!-- main -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<!-- navbar -->
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<!-- evaluation work -->
	<link rel="stylesheet" type="text/css" href="css/work_eva.css">

	<style type="text/css">
		.emply_names {
			-ms-transform: rotate(-30deg); 
			transform: rotate(-30deg); 
			position: absolute; 
			top: -15px; 
			left: 10px; 
			transform-origin: left bottom;;
		}
	</style>

</head>
<body style="background: #F2F3F4;">

	<!-- NAVBAR -->
	<?php include "assets/navbar.php"; ?>

	<!-- HEADER -->
	<div class="container bg-light shadow mt-3 ps-4 pe-4 pt-2 pb-1">
		<h3>Work Evaluation</h3>
	</div>

	<div class="container bg-light shadow mt-3 p-3">
		
		<!-- table -->
		<table class="table table-striped-columns table-bordered border-dark">
<!-- 		  <thead>
		  	<tr>
			  	<th>ID</th>
			  	<th>Name</th>
			  	<th>Age</th>
		  	</tr>
		  </thead> -->
		  <tbody>
		  	<tr class="border-0">
		  		<td style="position: relative;"><div class="emply_names">Name</div></td>
		  		<td style="position: relative;"><div class="emply_names">Performance</div></td>
		  		<td style="position: relative;"><div class="emply_names">Job Knowledge</div></td>
		  	</tr>
		  	<tr>
		  		<td>sassaas</td>
		  		<td>Antony</td>
		  		<td>32</td>
		  	</tr>
		  	<tr>
		  		<td>03</td>
		  		<td>Brown</td>
		  		<td>42</td>
		  	</tr>
		  </tbody>
		</table>

	</div>


	<!-- FOOTER -->
	<?php include "assets/myfooter.php"; ?>
	

	<!-- Bootstrap bundles JS -->
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>