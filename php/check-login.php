<?php
session_start();
include "../db_conn.php"; // Connection 

if(isset($_POST['username']) && isset($_POST['password'])) {
	
	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	if(empty($username)) {
		header("Location: ../index.php?login_error=User Name is Required");
		//echo "<script> alert('Username is Requried'); window.location.href = '../login.php'; </script>";
	}else if(empty($password)) {
		header("Location: ../index.php?login_error_2=Password is Required");
		//echo "<script> alert('Password is Requried'); window.location.href = '../login.php'; </script>";
	}else {
		
		// Hashing the password
		$password = md5($password);

		$sql = "SELECT * FROM hr_accounts WHERE user_email='$username' AND user_pass='$password'";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) === 1){
			// the user name must be unique
			$row = mysqli_fetch_assoc($result);
			if($row['user_pass'] === $password) {
				$_SESSION['id'] = $row['id'];
				$_SESSION['role'] = $row['user_role'];
				$_SESSION['idNum'] = $row['id_number'];

				header("Location: ../admin_home.php");
			}else {
				header("Location: ../index.php?login_error_3=Incorrect User name or Password");
				//echo "<script> alert('Incorrect User name or Password'); window.location.href = '../login.php'; </script>";
				exit();
			}
		}else {
			header("Location: ../index.php?login_error_3=Incorrect User name or Password");
			//echo "<script> alert('Incorrect User name or Passwordd'); window.location.href = '../login.php'; </script>";
			exit();
		}
	}

}else {
	header("Location: ../index.php");
}

?>