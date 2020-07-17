<?php
	include("../../login/SessionCheck.php");
	
	if($_SESSION['user_type'] != 1)
		header("location /");

?>
