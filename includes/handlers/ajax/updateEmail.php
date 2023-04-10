<?php
include("../../config.php");

if(!isset($_POST['usr_uname'])) {
	echo "ERROR: Could not set username";
	exit();
}

if(isset($_POST['usr_uname']) && $_POST['usr_email'] != "") {

	$username = $_POST['usr_uname'];
	$email = $_POST['usr_email'];

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Email is invalid";
		exit();
	}

	$emailCheck = mysqli_query($con, "SELECT usr_email FROM users WHERE usr_email='$email' AND usr_uname != '$username'");
	if(mysqli_num_rows($emailCheck) > 0) {
		echo "Email is already in use";
		exit();
	}

	$updateQuery = mysqli_query($con, "UPDATE users SET usr_email = '$email' WHERE usr_uname='$username'");
	echo "Update successful";

}
else {
	echo "You must provide an email";
}

?>
