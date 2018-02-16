<?php
	session_start();
	include('./dbh.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<div id="main">
		<h1 style="background-color: #6495ed;color: white;"><?php echo $_SESSION['name']; ?>-online</h1>

		<div class="output">
			<?php
				//select all rows FROM "posts" table
				//this should be changed to fetch the most recent 10-20 posts
				//implement an infinite scroll solution for loading more
				$sql = "SELECT * FROM posts";
				$result = $conn->query($sql);

				if($result->num_rows > 0){
					// output data of each row

					//message counter for advertising
					$messageCount = 0;

					while($row = $result->fetch_assoc()){
						if($messageCount % 10 == 0 && $messageCount != 0){
							//echo advertisement div
							echo "[ADVERTISEMENT PLACEHOLDER]<br><br>";
						}
						else{
							//echo post
							//add most recent reply as second row
							echo "" . $row["name"] . " " . ":: " . $row["msg"] . " --" . $row["date"] . "<br><br>";
						}
						//post divider
						//will not be necessary after posts are inserted into divs
						echo "<hr>";
						$messageCount++;
					}
				}
				else {
					//fallback if db empty
					echo "0 results";
				}
				$conn->close();
			?>
		</div>

		<!-- send messages -->
		<form method="post" action="send.php">
			<textarea name="msg" placeholder="Type to send message..." class="form-control"></textarea><br>
			<input type="submit" value="Send">
		</form>
		<br>
		<!-- logout form -->
		<form action="logout.php">
			<input style="width: 100%; background-color: #6495ed; color: white; font-size: 20px;" type="submit" value="Logout">
		</form>
	</div>
</body>
</html>

