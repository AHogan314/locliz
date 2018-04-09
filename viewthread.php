<?php
	session_start();
	include('./dbh.php');
	include('./login-check.php');
	$threadId = $_GET['id'];

// converts timestamp to time elapsed string. 
// needs to consider time zone changes. currently gives incorrect time. 
// needs to be moved to a functions page. 
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'y',
        'm' => 'mo',
        'w' => 'w',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 's',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ' : 'just now';
}
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
					while($row = $result->fetch_assoc()){

					// convert timestamp
					$fixedTime = time_elapsed_string($row['date']);
					?>
						<!-- thread OP card -->
						<div class='row'>
							<div class='card thread-card col-md-6 col-sm-6 col-xs-11'>
								<div class="row">
									<div class="col-xs-12">
										<!-- thread title -->
										<?php if(empty($row['title'])){ ?>
											<h3 class='card-title'>(no title)</h3>
										<?php } 
										else{ ?>
											<h3 class='card-title'><?php echo $row['title']; ?></h3>
										<?php } ?>
										<!-- thread text -->
										<p class='card-text'><?php echo $row['msg']; ?></p>
									</div>
								</div>

								<!-- thread controls -->
								<nav class="navbar center">
									<div class="navbar-inner">
									    <ul class="nav navbar-nav">
									    	<li>
												<!-- timestamp -->
												<p class="navbar-text">
													<span class='glyphicon glyphicon-time'></span> <?php echo $fixedTime; ?>
												</p>
											</li>
									        <!-- reply: opens thread in new page -->
									        <li><a href="./viewthread.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-comment"></a></li>
									        <!-- favorite -->
									        <li><a href="#"><span class="glyphicon glyphicon-heart-empty"></a></li>
									        <!-- more -->
									    	<li class="dropdown">
												<a href="#" class ="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-horizontal"></span></a>
												<ul class="dropdown-menu">
													<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
													<li><a href="#"><span class="glyphicon glyphicon-ban-circle"></span> Block</a></li>
													<li><a href="#"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a></li>
												</ul>
											</li>
											<li>
												<p class="navbar-text">
													<!-- location -->
													<?php if(empty($row['location'])){ ?>
														<span style='float: right;'><span class='glyphicon glyphicon-map-marker'></span> Unknown</span>			
													<?php }
													else{?>
														<span style='float: right;'><span class='glyphicon glyphicon-map-marker'></span> <?php $row['date'];?></span>
													<?php }
													// include('./thread-navbar.php');	?>
												</p>
											</li>
									    </ul>
									</div>
								</nav>
							</div>
						</div>
					<?php
					}
				}
				else {
					// fallback if db empty
					echo "thread not found!";
				}

				// reply handler
				// select all rows FROM "replies" table and sort newest to oldest
				$sql = "SELECT * FROM replies WHERE thread_id = $threadId";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					// output data of each row
					while($row = $result->fetch_assoc()){
					$fixedTime = time_elapsed_string($row['date']);
				?>
						<!-- thread card -->
						<div class='row'>
							<div class='card thread-card col-md-6 col-sm-6 col-xs-11'>
								<div class="row">
									<div class="col-xs-12">
										<!-- thread text -->
										<p class='card-text'><?php echo $row['msg']; ?></p>
									</div>
								</div>

								<!-- thread controls -->
								<nav class="navbar center">
									<div class="navbar-inner">
									    <ul class="nav navbar-nav">
									    	<li>
												<!-- timestamp -->
												<p class="navbar-text">
													<span class='glyphicon glyphicon-time'></span> <?php echo $fixedTime; ?>
												</p>
											</li>
									        <!-- reply: opens thread in new page -->
									        <li><a href="./viewthread.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-comment"></a></li>
									        <!-- favorite -->
									        <li><a href="#"><span class="glyphicon glyphicon-heart-empty"></span></a></li>
									        <!-- more -->
									    	<li class="dropdown">
												<a href="#" class ="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-horizontal"></span></a>
												<ul class="dropdown-menu">
													<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
													<li><a href="#"><span class="glyphicon glyphicon-ban-circle"></span> Block</a></li>
													<li><a href="#"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a></li>
												</ul>
											</li>
											<li>
												<p class="navbar-text">
													<!-- location -->
													<?php if(empty($row['location'])){ ?>
														<span style='float: right;'><span class='glyphicon glyphicon-map-marker'></span> Unknown</span>			
													<?php }
													else{?>
														<span style='float: right;'><span class='glyphicon glyphicon-map-marker'></span> <?php $row['date'];?></span>
													<?php }
													// include('./thread-navbar.php');	?>
												</p>
											</li>
									    </ul>
									</div>
								</nav>
							</div>
						</div>
			<?php
					}
				}
				else {
					// fallback if no replies
					echo "<br>no replies";
				}
				$conn->close();
			?>

			<!-- send replies -->
			<form style="margin-top: 100px; margin-bottom: 100px" method="post" action="reply.php" id="replyForm">
				<textarea name="msg" placeholder="<?php echo $threadId ;?>" class="form-control"></textarea><br>
				<input type="hidden" name="thread_id" value="<?php echo $threadId ;?>">
				<input type="submit" value="Send" id="submitButton">
			</form>
			<br>

		<!-- bottom navigation bar -->
		<?php include('./nav-bottom.php'); ?>		
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>

	</body>
</html>

<script>
$(document).ready(function () {
	// gets user geolocation on submit button click. 
	$( "#replyForm" ).submit(function( event ) {
	    event.preventDefault();
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
		$.post("reply.php", {thread_id: $('input[name="thread_id"]').val(), msg: $('textarea[name="msg"]').val(), latitude: latitude, longitude: longitude});
		// redirect to thread
		window.location.href = "viewthread.php?id=" + $('input[name="thread_id"]').val();
	}
});
</script>