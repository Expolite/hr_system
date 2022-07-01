
<?php 
	session_start();
	include "db_conn.php"; // Connection
	// user id and user role
	if(isset($_SESSION['id']) && isset($_SESSION['role'])){
		$usrID = $_SESSION['id']; // account ID
		$usr_IDNmbr = $_SESSION['idNum'];// emply ID number
		$usrRole = $_SESSION['role']; // user role

		// if either user role are admin or user
		if($usrRole == "admin" || $usrRole == "user"){
			// proceed
		}else{
			header("Location: index.php"); // back to login form
		}
	}else{
		header("Location: index.php"); // back to login form
	}



	// query to get user info
	$usrInfo_sql = "SELECT * FROM hr_accounts WHERE id = '$usrID'";
	$usrInfo_res = mysqli_query($conn, $usrInfo_sql);
	// get all the data
	if (mysqli_num_rows($usrInfo_res) > 0){
		while ($usrInfo_row = mysqli_fetch_assoc($usrInfo_res)){
			$userID = $usrInfo_row['id_number']; // ID Number
			$userEmail = $usrInfo_row['user_email']; // email address
			$userFname = $usrInfo_row['fname']; // first name
			$userLname = $usrInfo_row['lname']; // last name
		}
	}



	// USER PROFILE
	$profile_pic_sql = "SELECT user_img FROM hr_accounts WHERE id = '$usrID'";
	$profile_pic_res = mysqli_query($conn, $profile_pic_sql);

	if (mysqli_num_rows($profile_pic_res) > 0) {
		while($profile_pic_row = mysqli_fetch_assoc($profile_pic_res)) {
			$imgName = $profile_pic_row["user_img"];
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>

	<!-- icon titlebar -->
	<link rel="shortcut icon" href="img/main/logo.jpeg" type="image/x-icon">
	<!-- main -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--font awesome-->
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.1.1-web/css/all.css">
	<!-- Bootstrap v4-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- Bootstrap v5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- user profile -->
	<link rel="stylesheet" type="text/css" href="css/profile.css">

	<style>
		table, th, td {
            border-collapse: collapse;
		}
	</style>
</head>
<body>





<!--container-->
<div class="usr_prf_container">
	<!-- ALERT -->

	<!-- success -->
	<?php if (isset($_GET['success'])): ?>
	<div class="alert alert-success" role="alert">
		<?php echo $_GET['success']; ?>
	</div>
	<?php endif ?>

	<!-- error -->
	<?php if (isset($_GET['error'])): ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_GET['error']; ?>
	</div>
	<?php endif ?>

	<!-- END - ALERT -->

	<!--img-->
	<div class="usr_img">
		<img src="img/profile/<?php echo $imgName; ?>" 
			 class="img-fluid rounded shadow border">
		<div class="userProfile_camera" 
			 title="Change picture"
			 data-toggle="modal"
			 data-target="#exampleModal">
		<i class="fa-solid fa-camera"></i>
		</div>
	</div>

	<hr style="border: 1px solid black; opacity: 1;">

	<!--Account Information-->
	<form action="php/update_account.php" method="POST">
	<table>
		<tr> <!--ID Number-->
			<td align="right">
				<b>ID Number: </b>
				<input type="text" name="acc_ID" value="<?php echo $usrID; ?>" style="display: none;">
			</td>
			<td style="Padding-left: 20px;"></td>
			<td>
				<span style="background: #383838; 
							 color: white; 
							 padding-top: 2px;
							 padding-bottom: 2px;
							 padding-left: 5px; 
							 padding-right: 5px;">
					<?php echo $userID; ?>
				</span>
			</td>
		</tr>
		<tr> <!--blank space-->
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
		</tr>
		<tr> <!--Email Address-->
			<td align="right">
				<b>Email: </b>
			</td>
			<td style="Padding-left: 20px;"></td>
			<td><input type="text" name="usrPfl_emailAdrs" class="no_otlns" value="<?php echo $userEmail; ?>" placeholder="Email Address" required></td>
		</tr>
		<tr> <!--blank space-->
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
		</tr>
		<tr> <!--Name-->
			<td align="right"><b>Name: </b></td>
			<td style="Padding-left: 20px;"></td>
			<td>
				<input type="text" name="usrPfl_fname" class="no_otlns" value="<?php echo $userFname; ?>" placeholder="First Name" required>
				<input type="text" name="usrPfl_lname" class="no_otlns" value="<?php echo $userLname; ?>" placeholder="Last Name" required>
			</td>
		</tr>
		<tr> <!--blank space-->
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
		</tr>
		<tr>
			<td style="font-weight: bold; color: grey;">Change password</td>
			<td colspan="2"><hr style="border: 1px solid grey; opacity: 1;"></td>
		</tr>
		<tr> <!--confirm Password-->
			<td align="right"><b>Confirm password: </b></td>
			<td style="Padding-left: 20px;"></td>
			<td><input type="password" name="usrPfl_confirm_psswd" class="no_otlns" placeholder="Confirm Password" required></td>
		</tr>
		<tr> <!--blank space-->
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
		</tr>
		<tr> <!--Password-->
			<td align="right"><b>password: </b></td>
			<td style="Padding-left: 20px;"></td>
			<td><input type="password" name="usrPfl_psswd" class="no_otlns" placeholder="Password" required></td>
		</tr>
		<tr> <!--blank space-->
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
			<td style="padding-top: 10px;"></td>
		</tr>
		<tr> <!--btn save-->
			<td></td>
			<td></td>
			<td>
				<button type="submit" name="save_btn" class="usrPfl_btnSave"><span class="fa-regular fa-floppy-disk"></span> Save</button>
			</td>
		</tr>
	</table>
	</form>
</div>








<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <!-- MODAL CONTENTS -->

	  <!-- FORM -->
      <form action="php/upload_profile_pic.php"
	  		method="POST"
			enctype="multipart/form-data">
		<div class="modal-body">
			<input class="form-control" type="file" name="imgFile">
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" name="upload_img_submit" class="btn btn-primary">Upload</button>
		</div>

		<!-- account id -->
		<input type="text" name="account_id" value="<?php echo $usrID; ?>" style="display: none;">
		<!-- old img name -->
		<input type="text" name="old_img" value="<?php echo $imgName; ?>" style="display: none;">
	  </form>
	  <!-- End FORM -->
    </div>
  </div>
</div>




<!-- Bootstrap scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<!-- for Input file -->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
	
</body>
</html>