<!DOCTYPE html>
<html>
	<head>
		<title>LoCLiZ</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">

			<!-- top navigation bar -->
			<?php include('./nav-top.htm'); ?>	

			<!-- main content -->
			<div id="main">
				<div id="info">

					<h2>login here</h2>				
					<form action="login.php" method="post">
						<label><b>Username:</b></label>
						<input type="text" name="uname" placeholder="User name"><br><br>
						<label><b>Password:</b></label>
						<input type="text" name="pass" placeholder="Password"><br><br>
						<button style="background-color: #6495ed;color: white;" type="submit"><b>Login</b></button>
					</form>

					<h2>don't have an account? sign up here</h2>
					<form action="signup.php" method="post">
						<label><b>Username:</b></label>
						<input type="text" name="uname" placeholder="User name"><br><br>
						<label><b>Email:</b></label>
						<input type="text" name="email" placeholder="Email address"><br><br>
						<label><b>Password:</b></label>
						<input type="text" name="pass" placeholder="Password"><br><br>
						<button style="background-color: #6495ed;color: white;" type="submit"><b>Register</b></button>
					</form>
			
				</div>
			</div>

			<!-- bottom navigation bar -->
			<?php include('./nav-bottom.htm'); ?>		

			<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="js/bootstrap.js"></script>
		
		</div>
	</body>
</html>


