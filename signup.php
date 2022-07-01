
<?php 
	session_start(); // start session.
	include "db_conn.php"; // Connection
	// if id and role value is not true.
	if(!isset($_SESSION['id']) && !isset($_SESSION['role'])) {
		// value are not true.
	}else{
		// value are true.
		// go back to home page
		header("Location: admin_home.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>

	<!-- icon titlebar -->
	<link rel="shortcut icon" href="img/main/logo.jpeg" type="image/x-icon">
	<!-- main -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--font awesome-->
	<link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Sign up -->
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body style="background-image: url('img/main/bg_3.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">



<!--navbar-->
<nav class="navbar navbar-light bg-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/main/logo.jpeg" alt="" width="30" height="30" style="border-radius: 50px;" class="d-inline-block align-text-top">
      <span class="log_title" style="color: white;">Human Resource Information System for DILG Calamba</span>
    </a>
  </div>
</nav>



<!-- Sign up -->
<center>
<div class="signup_container">
<div class="signup_container_2">
<!-- logo -->
<div class="login_logo">
<img src="img/main/logo.jpeg">
</div>
<br>
<h2>Sign Up</h2>
<!-- input field -->
<div class="signup_field">
<form action="php/create_account.php" method="POST">
<table>
	<tr> <!-- ID Number -->
		<td align="right">ID Number &nbsp;</td>
		<td><input type="text" name="id_number" id="user_signup_id"></td>
	</tr>
	<tr>
		<td style="padding-top: 10px;"></td>
		<td style="padding-top: 10px;"></td>
	</tr>
	<tr> <!-- Email -->
		<td align="right">Email &nbsp;</td>
		<td><input type="email" name="user_email" id="user_signup_email"></td>
	</tr>
	<tr>
		<td style="padding-top: 10px;"></td>
		<td style="padding-top: 10px;"></td>
	</tr>
	<tr> <!-- Password -->
		<td align="right">Password &nbsp;</td>
		<td ><input type="password" name="user_pass" id="user_signup_pass"></td>
	</tr>
	<tr>
		<td style="padding-top: 10px;"></td>
		<td style="padding-top: 10px;"></td>
	</tr>
	<tr> <!-- Confirm Password -->
		<td align="right">Confirm Password &nbsp;</td>
		<td ><input type="password" 
					name="user_confirm_pass" 
					id="user_signup_confirm_pass"></td>
	</tr>
	<tr> <!--alert password-->
		<td></td>
		<td>
			<!--Alert error msg-->
			<?php if(isset($_GET['signup_error_msg'])) { ?>
				<span class="login_error_msg">
					<i class="fa-solid fa-circle-exclamation"></i> 
					<?=$_GET['signup_error_msg']?>
				</span>
			<?php } ?>
			
		</td>
	</tr>
	<tr>
		<td style="padding-top: 10px;"></td>
		<td style="padding-top: 10px;"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<!-- login btn -->
			<div class="signup_btn">
			<button type="submit" name="signup" onclick="signup()">SIGN UP</button>
			</div>
		</td>
	</tr>
</table>
</form>
<br>
<!-- sign up -->
<div style="font-size: 14px;">
Have an account?
<a class="forgot_pass_link" href="index.php">Login</a>
</div>
	
</div>
</div>
</center>
	


<!--Script-->
<script type="text/javascript" src="js/main.js"></script>

</body>
<footer class="login_footer_container">
<center><div class="login_footer">Human Resource Information System for DILG Calamba</div></center>
</footer>
</html>