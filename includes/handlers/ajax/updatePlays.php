<?php
include("../../config.php");

if(isset($_POST['id'])) {
	$songId = $_POST['id'];

	$query = mysqli_query($con, "UPDATE songs SET s_views = s_views + 1 WHERE s_id='$songId'");
}
?>
