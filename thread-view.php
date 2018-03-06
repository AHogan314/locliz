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
						<!-- thread is clickable -->
						<div class='card thread-card col-md-6 col-sm-6 col-xs-11 ' onclick='location.href="./viewthread.php?id=<?php echo $row['id'];?>"'>
						<!-- thread title -->
						<?php if(empty($row['title'])){ ?>
							<h3 class='card-title'>(no title)</h3>
						<?php } 
						else{ ?>
							<h3 class='card-title'><?php echo $row['title']; ?></h3>
						<?php } ?>
						<!-- thread text -->
						<p class='card-text'><?php echo $row['msg']; ?></p>
						<!-- timestamp -->
						<span class='glyphicon glyphicon-time'></span> <?php echo $row['date']; ?>
						<!-- location -->
						<?php if(empty($row['location'])){ ?>
							<span style='float: right;'><span class='glyphicon glyphicon-map-marker'></span> Unknown</span>			
						<?php }
						else{?>
							<span style='float: right;'><span class='glyphicon glyphicon-map-marker'></span> <?php $row['date'];?></span>
						<?php }

						include('./thread-navbar.php');	?>

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