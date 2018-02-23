<?php
	session_start();
	include('./dbh.php');

	include('./login-check.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">

			<!-- top navigation bar -->
			<?php include('./nav-top.php'); ?>	

			<!-- threads -->
			<?php include('./thread-view.php'); ?>

			<!-- bottom navigation bar -->
			<?php include('./nav-bottom.php'); ?>		

			<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="js/bootstrap.js"></script>

		</div>
	</body>
</html>

