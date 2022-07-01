
<?php 
	session_start(); // start session.
	include "db_conn.php"; // Connection
	// if id and role value is not true.
	if(!isset($_SESSION['id']) && !isset($_SESSION['role'])) {
		// value are not true.
	}else{
		// value are true.
		// go back to home page.
		header("Location: admin_home.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<!-- icon titlebar -->
	<link rel="shortcut icon" href="img/main/logo.jpeg" type="image/x-icon">
	<!-- main -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--font awesome-->
	<link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- login -->
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="background-image: url('img/main/bg_3.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">


<!--navbar-->
<nav class="navbar navbar-light bg-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/main/logo.jpeg" alt="" width="30" height="30" style="border-radius: 50px;" class="d-inline-block align-text-top">
      <span class="log_title" style="color: white;">Employee Evaluation Management System For Dilg Calamba</span>
    </a>
  </div>
</nav>





<!-- login -->
<center>
<div class="login_container">
<div class="login_container_2">
<!-- logo -->
<div class="login_logo">
<img src="img/main/logo.jpeg">
</div>
<br>
<h2>Login</h2>
<!--Alert-->
<?php if(isset($_GET['login_error_3'])) { ?>
  <span class="login_error_msg"><?=$_GET['login_error_3']?></span>
<?php } ?>
<!-- input field -->
<div class="login_field">
<form action="php/check-login.php" method="POST">
<table>
	<tr>
		<td align="right">Email &nbsp;</td>
		<td><input type="email" name="username" id="user_email"><br></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<!--Alert-->
			<?php if(isset($_GET['login_error'])) { ?>
				<span class="login_error_msg">
					<i class="fa-solid fa-circle-exclamation"></i> 
					<?=$_GET['login_error']?>
				</span>
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td style="padding-top: 10px;"></td>
		<td style="padding-top: 10px;"></td>
	</tr>
	<tr>
		<td align="right">Password &nbsp;</td>
		<td ><input type="password" name="password" id="user_pass"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<!--Alert-->
			<?php if(isset($_GET['login_error_2'])) { ?>
				<span class="login_error_msg">
					<i class="fa-solid fa-circle-exclamation"></i> 
					<?=$_GET['login_error_2']?>
				</span>
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><a class="forgot_pass_link" href="#">Forgot Password?</a></td>
	</tr>
	<tr>
		<td style="padding-top: 10px;"></td>
		<td style="padding-top: 10px;"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<!-- login btn -->
			<div class="login_btn">
			<button type="submit" onclick="login()">LOGIN</button>
			</div>
		</td>
	</tr>
</table>
</form>
<br>
<!-- sign up link -->
<div style="font-size: 14px;">
Don't have account yet?
<a class="forgot_pass_link" href="signup.php">Sign up</a>
</div>
</div>
	
</div>
</div>
</center>


<?php //echo md5("111"); ?>

<!--JavaScript-->
<script type="text/javascript" src="js/main.js"></script>
	
</body>

<!-- FOOTER -->
<?php include "assets/myfooter.php"; ?>

</html>
