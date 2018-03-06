<?php
	session_start();
	include('./dbh.php');

	include('./login-check.php');

	$threadId = $_GET['id'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Thread</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="container" style="margin-top: 200px">



			<?php
				// select all rows FROM "posts" table and sort newest to oldest
				$sql = "SELECT * FROM posts WHERE id = $threadId";
				$result = $conn->query($sql);

				// this should always be exactly one row, probably could rewrite this
				if($result->num_rows > 0){
					// output data of each row
					while($row = $result->fetch_assoc()){
						// echo post
						echo "" . $row["name"] . " " . ":: " . $row["msg"] . " -- " . $row["date"] . "<br><br>";
					}
				}
				else {
					// fallback if db empty
					echo "thread not found!";
				}

				// reply handler
				// select all rows FROM "posts" table and sort newest to oldest
				$sql = "SELECT * FROM replies WHERE thread_id = $threadId";
				$result = $conn->query($sql);

				// this should always be exactly one row, probably could rewrite this
				if($result->num_rows > 0){
					// output data of each row
					while($row = $result->fetch_assoc()){
						// echo post
						echo "" . $row["name"] . " " . ":: " . $row["msg"] . " -- " . $row["date"] . "<br><br>";
					}
				}
				else {
					// fallback if no replies
					echo "<br>no replies";
				}
				$conn->close();
			?>

			<!-- send replies -->
			<form style="margin-top: 100px; margin-bottom: 100px" method="post" action="reply.php">
				<textarea name="msg" placeholder="<?php echo $threadId ;?>" class="form-control"></textarea><br>
				<input type="hidden" name="thread_id" value="<?php echo $threadId ;?>">
				<input type="submit" value="Send">
			</form>
			<br>

<!-- geolocation -->
<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
</script>





			<!-- bottom navigation bar -->
			<?php include('./nav-bottom.php'); ?>		
		</div>
		
		<script src="http:// ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>

	</body>
</html>

