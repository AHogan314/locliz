<!-- thread controls -->
<nav class="navbar center">
<div class="navbar-inner">
    <ul class="nav navbar-nav">
    	<!-- thumbs up -->
        <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a></li>
       	<!-- thumbs down -->
        <li><a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a></li>
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
    </ul>
</div>
</span></nav>
