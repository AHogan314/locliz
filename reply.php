<?php
	// handles replies on viewthread page

	session_start();

	// include database credentials/connection
	include('./dbh.php');

	$msg = $_POST['msg'];
	$threadId = $_POST['thread_id'];
	$name = $_SESSION['name'];

	$sql = "insert into replies(msg, name, thread_id) values('$msg', '$name', '$threadId')";
	$result = $conn->query($sql);

	header("Location:viewthread.php?id=" . $threadId);

?>