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
					
					// echo advertisement div every 10 messages
					if($messageCount % 10 == 0 && $messageCount != 0){
						// echo advertisement div
						echo "<div class='thread-row'>";
						echo "[ADVERTISEMENT PLACEHOLDER]";
						include('./thread-navbar.php');	
						echo "</div>";
					}
					
					// echo post
					// add most recent reply as second row
					echo "<div class='thread-row'>";
					echo "user: " . $row["name"] . "<br>message: " . $row["msg"] . "<br>date: " . $row["date"] . "<br>";
					include('./thread-navbar.php');	
					echo "</div>";

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