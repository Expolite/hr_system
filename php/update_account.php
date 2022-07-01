<?php 

	include "../db_conn.php"; // Connection

	if(isset($_POST['save_btn'])){

		// get value
		$acc_id = $_POST['acc_ID']; // account id
		$email_address = $_POST['usrPfl_emailAdrs']; // email address
		$fname = $_POST['usrPfl_fname']; // first name
		$lname = $_POST['usrPfl_lname']; // last name
		$confirm_pass = $_POST['usrPfl_confirm_psswd']; // confirm password
		$password = $_POST['usrPfl_psswd']; // password

		// confirm password
		// if the password match, update data. Else -> display error
		if($confirm_pass == $password){

			// encrypt password
			$enrypt_pass = md5($password);

			// update query
			$pass_sql = "UPDATE hr_accounts SET user_email = '$email_address', fname = '$fname', lname = '$lname', user_pass = '$enrypt_pass' WHERE id = '$acc_id'";
			$res = mysqli_query($conn, $pass_sql);

			if($res){
				echo "update complete!";
			}else{
				echo "Update error";
			}
		}else{
			echo "<script> alert('Password do not match.'); </script>";
		}

	}
?>