<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$usr_uname = $_POST['loginUsername'];
	$usr_pword = $_POST['loginPassword'];

	$result = $account->login($usr_uname, $usr_pword);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $usr_uname;
		header("Location: index.php");
	}

}
?>
