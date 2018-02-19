<?php
	session_start();
	include('./dbh.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Notifications</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">

			<!-- top navigation bar -->
			<?php include('./nav-top.htm'); ?>	

			<!-- bottom navigation bar -->
			<?php include('./nav-bottom.htm'); ?>		

		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>

	</body>
</html>

