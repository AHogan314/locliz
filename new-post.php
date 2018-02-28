<?php
	session_start();
	include('./dbh.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create Post</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">

			<!-- top navigation bar -->
			<?php include('./nav-top.php'); ?>	


				<!-- send messages -->
				<form style="margin-top: 100px; margin-bottom: 100px" method="post" action="send.php">
					<textarea name="msg" placeholder="Type to send message..." class="form-control"></textarea><br>
					<input type="submit" value="Send">
				</form>
				<br>



			<!-- bottom navigation bar -->
			<?php include('./nav-bottom.php'); ?>		

		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>

	</body>
</html>

