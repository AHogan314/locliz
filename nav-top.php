<?php
	// post filters
	$sortOrder = "";
	$radius = "";
	$radiusName = "Auto";
	if(isset($_GET["radius"])){
		if(!is_null($_GET["sort"])){
			$sortOrder = "&sort=" . $_GET["sort"];
		}
	}
	if(isset($_GET["radius"])){
		if(!is_null($_GET["radius"])){
			$radius = "&radius=" . $_GET["radius"];
			$radiusName = $_GET["radius"];
			// fix spacing of radius name
			$radiusName = str_replace("_", " ", $radiusName);
		}
	}

?>

<!-- top navigation bar -->
<nav class="navbar navbar-inverse navbar-fixed-top center">
	<!-- necessary to constrain contents at full page width -->
	<div class ="navbar-header">
		<!-- hamburger button -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<!-- navbar logo -->
		<!-- <a href="#" class="navbar-brand">LoCLiZ</a> -->
	</div>
	
	<!-- navigation links -->
	<div class="navbar-inner">
        <ul class="nav navbar-nav">
            <li><a href="index.php?sort=newest<?php echo $radius;?>">Newest</a></li>
            <li><a href="index.php?sort=mostReplies<?php echo $radius;?>">Most Replies</a></li>
            <li><a href="map.php">Map</a></li>
        	<li class="dropdown">
				<a href="#" class ="dropdown-toggle" data-toggle="dropdown">Radius: <?php echo $radiusName;?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="index.php?radius=Auto<?php echo $sortOrder;?>">Auto</a></li>
					<li><a href="index.php?radius=Worldwide<?php echo $sortOrder;?>">Worldwide</a></li>
					<li><a href="index.php?radius=1000_Miles<?php echo $sortOrder;?>">1000 Miles</a></li>
					<li><a href="index.php?radius=100_Miles<?php echo $sortOrder;?>">100 Miles</a></li>
					<li><a href="index.php?radius=50_Miles<?php echo $sortOrder;?>">50 Miles</a></li>
					<li><a href="index.php?radius=1_Mile<?php echo $sortOrder;?>">1 Mile</a></li>
					<li><a href="index.php?radius=1000_Feet<?php echo $sortOrder;?>">1000 Feet</a></li>
				</ul>
			</li>
        </ul>
    </div>
</nav>