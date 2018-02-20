<?php
	session_start();
	include('./dbh.php');
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
			<?php include('./nav-top.htm'); ?>	

			<div id="main" style="margin-top: 100px; margin-bottom: 100px">
				<h1 style="background-color: #6495ed;color: white;"><?php echo $_SESSION['name']; ?>-online</h1>

				<div class="output">
					<?php
						//select all rows FROM "posts" table and sort newest to oldest
						//this should be changed to fetch the most recent 10-20 posts
						//implement an infinite scroll solution for loading more
						$sql = "SELECT * FROM posts ORDER BY date DESC";
						$result = $conn->query($sql);

						if($result->num_rows > 0){
							// output data of each row

							//message counter for advertising
							$messageCount = 0;

							while($row = $result->fetch_assoc()){
								
								// echo advertisement div every 10 messages
								if($messageCount % 10 == 0 && $messageCount != 0){
									//echo advertisement div
									echo "[ADVERTISEMENT PLACEHOLDER]<br><br>";
								}
								
									//echo post
									//add most recent reply as second row
									

									echo "" . $row["name"] . " " . ":: " . $row["msg"] . " -- " . $row["date"] . "<br><br>";

									include('./thread-navbar.php');	

							
								//post divider
								//will not be necessary after posts are inserted into divs
								echo "<br>";
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
			</div>

			<!-- bottom navigation bar -->
			<?php include('./nav-bottom.htm'); ?>		

			<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="js/bootstrap.js"></script>

		</div>
	</body>
</html>

