<!-- threads -->
<div id="main" style="margin-top: 100px; margin-bottom: 100px">
	<div class="output">
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
					
					// echo advertisement div every 10 messages
					if($messageCount % 10 == 0 && $messageCount != 0){
						// echo advertisement div
						echo "[ADVERTISEMENT PLACEHOLDER]<br><br>";
					}
					
						// echo post
						// add most recent reply as second row
						

						echo "" . $row["name"] . " " . ":: " . $row["msg"] . " -- " . $row["date"] . "<br><br>";

						include('./thread-navbar.php');	

				
					// post divider
					// will not be necessary after posts are inserted into divs
					echo "<br>";
					$messageCount++;
				}
			}
			else {
				// fallback if db empty
				echo "0 results";
			}
			$conn->close();
		?>
	</div>
</div>