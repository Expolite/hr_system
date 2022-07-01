<?php
session_start();
include "../db_conn.php"; // Connection 

if(isset($_POST['id_number']) && isset($_POST['user_email']) && isset($_POST['user_pass']) && isset($_POST['user_confirm_pass'])) {

	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// get the value
	$id_number = test_input($_POST['id_number']);
	$email_address = test_input($_POST['user_email']);
	$pass = test_input($_POST['user_pass']);
	$confirm_pass = test_input($_POST['user_confirm_pass']);

	// check the password if match
	if($pass === $confirm_pass){
		// code here...

	// Notification
	/*if(empty($username)) {
		header("Location: regs.php?error=User Name is Required");
	}*/

	// if the Save button clicked
	if (isset($_POST['signup'])) { // else #1 ===========
		if (!empty($_POST['id_number']) && !empty($_POST['user_email']) && !empty($_POST['user_pass'])) {

			$id_number = $_POST['id_number'];
			$user_email = $_POST['user_email'];

			// Check the user id number if exist in database (tbl_id_numbers)
			$user_idNumber = "SELECT id_number FROM tbl_id_numbers WHERE id_number='$id_number'";
			$user_idNumber_result = mysqli_query($conn, $user_idNumber);

			// check if the id number already exist from database
			if (mysqli_num_rows($user_idNumber_result) > 0) {
				
				// check if email address already exist (stop) else (yes:continue)
				$user_email = "SELECT user_email FROM hr_accounts WHERE user_email='$user_email'";
				$user_email_res = mysqli_query($conn, $user_email);

				if(mysqli_num_rows($user_email_res) > 0){
					echo "Your email already taken";
					
				// END check user email
				}else {
					// declare variable
					$id_number = $_POST['id_number'];
					$email_address = $_POST['user_email'];
					$pass = $_POST['user_pass'];

					//Hash the password
					$pass_2 = md5($pass);

					//mysqli command - save data
					$conn->query("INSERT INTO hr_accounts (user_email, user_pass, user_role, id_number) VALUES('$email_address','$pass_2','user','$id_number')") or die($conn->error);

					// Successfully saved data

					//Login the account
					// get value from sign up form
					$username = test_input($_POST['user_email']);
					$password = test_input($_POST['user_pass']);

					$password = md5($password); //encryp password

					$sql = "SELECT * FROM hr_accounts WHERE user_email='$username' AND user_pass='$password'";
					$result = mysqli_query($conn, $sql);

					if(mysqli_num_rows($result) === 1){
						// the user name must be unique   // same username unable to login
						$row = mysqli_fetch_assoc($result);
						if($row['user_pass'] === $password) {
							$_SESSION['id'] = $row['id'];
							$_SESSION['role'] = $row['user_role'];
							$_SESSION['id_num'] = $row['id_number'];

							// if role is user -> goto user home page
							// if not -> goto admin home page
							if($row['user_role'] === "user"){
								header("location: ../test.php");
							}else{
								header("Location: ../admin_home.php"); 
							}

							//echo "success";
						}else {
							echo "Incorrect username and password";
						}
					}else {
						echo "Incorrect username and password.";
					}
				}
			}else {
				echo "Your ID don't have any record from our database.";
			}

		/*}else { // else #2
			header("Location: regs.php?error=Cannot be empty.");
		}*/

	// else #1
	}else{
		header("Location: ../signup.php");
	}

  	}

	// if the password are not equal
	}else{
		header("Location: ../signup.php?signup_error_msg=Password do not match.");
	}


}else {
	header("Location: ../signup.php");
}





?>