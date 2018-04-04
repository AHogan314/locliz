<?php
	//handles submitting a new thread

	session_start();

	// include database credentials/connection
	include('./dbh.php');

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);
	$latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
	$longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
	$name = mysqli_real_escape_string($conn, $_SESSION['name']);

	$sql = "insert into posts(title, msg, name, latitude, longitude) values('$title', '$msg', '$name', '$latitude', '$longitude')";
	$result = $conn->query($sql);

	header("Location:index.php");

?>