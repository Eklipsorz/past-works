<?php
	

	if ( isset($_GET["digit"]) && $_GET["digit"]!="" )
		$digit = $_GET["digit"];
	else
		return;

	if ( isset($_GET["numOfset"]) && $_GET["numOfset"]!="" )
		$numOfset = $_GET["numOfset"];
	else
		return;
	
	if ( isset($_GET["speed"]) && $_GET["speed"]!="" )
		$speed = $_GET["speed"];
	else
		return;
	
	if ( isset($_GET["maxOfque"]) && $_GET["maxOfque"]!="" )
		$maxOfque = $_GET["maxOfque"];
	else
		return;
	echo $digit;
	echo $numOfset;
	echo $speed;

	session_start();
	$_SESSION['madsys_numOfquest'] = 1;
	$_SESSION['isFirst'] = 1;
	$_SESSION['madsys_digit'] = $digit;
	$_SESSION['madsys_numOfset'] = $numOfset;
	$_SESSION['madsys_speed'] = $speed;	
	$_SESSION['madsys_maximum'] = $maxOfque+1;
	$_SESSION['num_of_correctQuest'] = 0;
	$_SESSION['current_question'] = array();

	$_SESSION['incorrect_question'] = array();
	$_SESSION['numOfincorrect'] = 0;
	$_SESSION['countOfjoinQuiz'] = 2;
?>
