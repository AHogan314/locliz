<?php

	//check if logged in, get username
	$loggedIn = false;
	$userName = null;
	if(isset($_SESSION['name']) && $_SESSION['name'] != null){
		$loggedIn = true;
		$userName = $_SESSION['name'];
	}

?>