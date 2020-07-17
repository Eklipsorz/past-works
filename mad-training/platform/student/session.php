<?php
	include("../../login/SessionCheck.php");
	
	if($_SESSION['user_type'] != 3)
		header("location /");

?>
