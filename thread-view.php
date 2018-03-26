<?php


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

<!-- threads -->
<div id="main" >
	<div class="thread-list">
		<?php
			// select all rows FROM "posts" table and sort newest to oldest
			// this should be changed to fetch the most recent 10-20 posts
			// implement an infinite scroll solution for loading more
			$sql = "SELECT * FROM posts ORDER BY date DESC";
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				// output data of each row
				// message counter for advertising
				$messageCount = 0;

				while($row = $result->fetch_assoc()){
					// convert timestamp
					$fixedTime = time_elapsed_string($row['date']);
					
					// advertisement card after every ten threads
					if($messageCount % 10 == 0 && $messageCount != 0){ ?>
						<!-- advertisement div -->
						<div class='row'>
							<div class='card thread-card col-md-6 col-sm-6 '>
								<h3 class='card-title'>(advertisement)</h3>
								<!-- to be replaced -->
								<?php include('./thread-navbar.php');?>	
						
							</div>
						</div>
					<?php } ?>
					
					<!-- thread card -->
					<div class='row'>
						<div class='card thread-card col-md-6 col-sm-6 col-xs-11'>
							<div class="row">
								<!-- message title/text is clickable -->
								<div class="col-xs-10" onclick='location.href="./viewthread.php?id=<?php echo $row['id'];?>"'>
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
								<div class="col-xs-2" style="text-align: center;" >
									<span style="font-size: 2em;" class='glyphicon glyphicon-chevron-up'></span>
									<br>
									<span style="font-size: 1.5em;">420</span>
									<br>
									<span style="font-size: 2em;" class='glyphicon glyphicon-chevron-down'></span>
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
</span></nav>


















						

						</div>
					</div>

					<?php $messageCount++; 
				}
			}
			else {?>
				 <!-- fallback if db empty -->
				<p>0 results</p>
			<?php }
			$conn->close();
		?>
	</div>
</div>