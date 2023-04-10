<?php
	include("../../config.php");

	if(isset($_POST['name']) && isset($_POST['usr_uname']))
	{

		$name = $_POST['name'];
		$owner = $_POST['usr_uname'];
		$date = date("Y-m-d");

		$query = mysqli_query($con, "INSERT INTO playlists VALUES ('', '$name', '$owner', '$date')");
	}

	else
	{
		echo "Name or username parameters not passed into file";
	}
?>
