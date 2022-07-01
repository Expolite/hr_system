
<?php  

define("DOMAIN_PATH", dirname(__DIR__));

require "../db_conn.php";

if(isset($_POST['upload_img_submit']) && isset($_FILES['imgFile'])) {
    $img_name = $_FILES['imgFile']['name'];
	$img_size = $_FILES['imgFile']['size'];
	$tmp_name = $_FILES['imgFile']['tmp_name'];
	$error = $_FILES['imgFile']['error'];

    // account id
    $account_id = $_POST['account_id'];
    $old_img = $_POST['old_img'];

    if ($error === 0) {
        if ($img_size > 2097152) { /* limit 2 MB */
            header("Location: ../user_profile.php?error=Sorry, your file is too large");
            exit();
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

            # file extension/format only allowed
			$allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../img/profile/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				# Insert into Database
				# update data
                $sql = "UPDATE hr_accounts SET user_img = '$new_img_name'
                        WHERE id = '$account_id'";
                if (mysqli_query($conn, $sql)) {
                    // Delete the prevous img
                    $file_location = "../img/profile/$old_img";
                    unlink($file_location);

                    header("location: ../user_profile.php?success=Upload Complete");
                    exit();
                }

            }else {
				header("Location: ../user_profile.php?error=You can't upload files of this type");
                exit();
            }
        }
    }else {
		header("Location: ../user_profile.php?error=unkown error occurred!");
        exit();
    }
}

?>