<?php
include("../../config.php");

if(isset($_POST['playlistId']) && isset($_POST['s_id'])) {
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['s_id'];

	$query = mysqli_query($con, "DELETE FROM playlistSongs WHERE playlistId='$playlistId' AND songId='$songId'");
}
else {
	echo "PlaylistId or songId was not passed into removeFromPlaylist.php";
}


?>
