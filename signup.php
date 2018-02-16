<?php
	// include database credentials/connection
	include('./dbh.php');

	// get user registration info from post
	$uname = $_POST['uname']; 
	$email = $_POST['email']; 
	$pass = $_POST['pass']; 

	// sql insert string
	$sql = "insert into signup(username,email,password)
	values ('$uname','$email','$pass')";
	
	// insert info into signup table in db
	$result = $conn->query($sql);
	
	// reload index
	header("Location:index.php");
?>