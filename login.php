<?php
	// login
	
	// session var start
	session_start();

	// include database credentials/connection
	include('./dbh.php');

	// get user login info from post
	$uname = $_POST['uname']; 
	$pass = $_POST['pass']; 

	// sql user fetch string
	$sql = "SELECT * FROM signup WHERE username='$uname' AND password = '$pass'";

	
	// run query
	$result = $conn->query($sql);

	// error handling
	if(!$row=$result->fetch_assoc()){
		header("Location:error.php");
	}
	else{

		$_SESSION['name']=$_POST['uname'];

		header("Location:home.php");
	}
	
?>