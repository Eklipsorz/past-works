<?php
	$username = "test";
//	$username = mysql_real_escape_string($username);
	$username = mysqli_real_escape_string($username);
	echo $username;
?>	
