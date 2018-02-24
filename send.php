<?php
	//handles submitting a new thread

	session_start();

	// include database credentials/connection
	include('./dbh.php');

	$msg = $_POST['msg'];
	$name = $_SESSION['name'];

	$sql = "insert into posts(msg, name) values('$msg', '$name')";
	$result = $conn->query($sql);

	header("Location:index.php");

?>