<?php
	// database connection

	// database credentials
	$dbHost = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "mydatabase";

	$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);


	if(!$conn){
		// die only accepts one arg according to php manual
		// die("connection failed", mysqli_connect_error());

		// this works
		die("connection failed");
	}

?>