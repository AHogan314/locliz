<?php
	// handles replies on viewthread page

	session_start();

	// include database credentials/connection
	include('./dbh.php');

	$msg = $_POST['msg'];
	$threadId = $_POST['thread_id'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$name = $_SESSION['name'];

	$sql = "insert into replies(msg, name, thread_id, latitude, longitude) values('$msg', '$name', '$threadId', $latitude, $longitude)";
	$result = $conn->query($sql);

	header("Location:viewthread.php?id=" . $threadId);

?>