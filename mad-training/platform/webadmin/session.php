<?php
	include("../../login/SessionCheck.php");
	
	if($_SESSION['user_type'] != 0)
		header("location /");

?>
