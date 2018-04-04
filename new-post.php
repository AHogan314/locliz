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
				<form id="newMessage" style="margin-top: 100px; margin-bottom: 100px">
					<textarea name="title" placeholder="Title" class="form-control"></textarea><br>
					<textarea name="msg" placeholder="Text" class="form-control"></textarea><br>
					<input type="hidden" name="latitude" value="">
					<input type="hidden" name="longitude" value="">
					<input type="submit" value="Send" id="submitButton">
				</form>
				<!-- bottom navigation bar -->
			<?php include('./nav-bottom.php'); ?>		
		</div>
		<!-- jQuery and Bootstrap sources -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>

<script>
	// the following prevents default form submit action.  
	document.getElementById("submitButton").addEventListener("click", function(event){
	    event.preventDefault()
	});
	// gets user geolocation on submit button click. 
	$('#submitButton').click(function() {
		if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } 
	    else { 
	       alert("Geolocation is not supported by this browser.");
	    }
	});
	function showPosition(position) {
		latitude = position.coords.latitude;
		longitude = position.coords.longitude;
		$.post("send.php", {title: $('textarea[name="title"]').val(), msg: $('textarea[name="msg"]').val(), latitude: latitude, longitude: longitude});
		// redirect to index
		window.location.href = "index.php?sort=newest";
		// in the future, should redirect to new thread
		// will require ajax call to get thread ID number
	}
</script>