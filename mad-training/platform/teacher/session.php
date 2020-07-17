<?php
	include("../../login/SessionCheck.php");
	
	if($_SESSION['user_type'] != 2)
		header("location /");

?>
