<!-- bottom navigation bar -->
<nav class="navbar navbar-inverse navbar-fixed-bottom center">
	
	<!-- navigation links -->
    <div class="navbar-inner">
        <ul class="nav navbar-nav">
        	<!-- home -->
            <li><a href="index.php?sort=newest"><span class="glyphicon glyphicon-home"></span></a></li>
            <!-- messages -->
            <li><a href="<?php echo ($loggedIn ? 'messages.php' : 'login-page.php');?>"><span class="glyphicon glyphicon-envelope"></a></li>
            <!-- new post -->
            <li><a href="<?php echo ($loggedIn ? 'new-post.php' : 'login-page.php');?>"><span class="glyphicon glyphicon-plus"></a></li>
            <!-- notifications -->
            <li><a href="<?php echo ($loggedIn ? 'notifications.php' : 'login-page.php');?>"><span class="glyphicon glyphicon-bell"></a></li>
            <!-- refresh -->
            <li><a href="#" onclick="pageRefresh()"><span class="glyphicon glyphicon-repeat"></a></li>
            <!-- more -->
        	<li class="dropdown">
				<a href="#" class ="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-horizontal"></span></a>
				<ul class="dropdown-menu">
					<li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search</a></li>
					<li><a href="<?php echo ($loggedIn ? 'settings.php' : 'login-page.php');?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
					<li><a href="<?php echo ($loggedIn ? 'profile.php' : 'login-page.php');?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
					<li><a href="<?php echo ($loggedIn ? 'logout.php' : 'login-page.php');?>"><span class="glyphicon glyphicon-log-out"></span> <?php echo ($loggedIn ? 'Logout' : 'Login');?></a></li>
				</ul>
			</li>

        </ul>
    </div>
</nav>

<script>
	function pageRefresh() {
	    location.reload();
	}
</script>