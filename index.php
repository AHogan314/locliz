<!DOCTYPE html>
<html>
	<head>
		<title>WebChat</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
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
	</body>
</html>