<?php
	
	if ( isset($_GET["selected_class"]) && $_GET["selected_class"]!="" )
		$classno = $_GET["selected_class"];
	else
		return;
	
	session_start();
	$_SESSION['current_selected_class'] =  $classno;

?>
