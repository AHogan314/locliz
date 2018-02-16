<?php

	//near identical to signup.php

	session_start();

	// include database credentials/connection
	include('./dbh.php');

	$msg = $_POST['msg'];
	$name = $_SESSION['name'];

	$sql = "insert into posts(msg, name) values('$msg', '$name')";
	$result = $conn->query($sql);

	header("Location:home.php");

?>