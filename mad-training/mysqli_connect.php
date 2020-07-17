<?php

	$servername = "localhost";
        $username = "mysql";
        $password = "yuyu913";
        $dbname = "mad_system";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	
	
	$conn->query("SET NAMES UTF8");
?> 
