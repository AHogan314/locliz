<?php
	//handles submitting a new thread

	session_start();

	// include database credentials/connection
	include('./dbh.php');

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);
	$name = mysqli_real_escape_string($conn, $_SESSION['name']);

	$sql = "insert into posts(title, msg, name) values('$title', '$msg', '$name')";
	$result = $conn->query($sql);

	header("Location:index.php");

?>