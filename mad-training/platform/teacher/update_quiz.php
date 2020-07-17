<?php

	include("../../mysqli_connect.php");	
	

	if ( isset($_GET["stu_id_value"]) && $_GET["stu_id_value"]!="" )
		$id = $_GET["stu_id_value"];
	else
		return;

	if ( isset($_GET["update_value"]) && $_GET["update_value"]!="" )
		$value = $_GET["update_value"];
	else
		return;
	
	if ( isset($_GET["update_type"]) && $_GET["update_type"]!="" )
		$type = $_GET["update_type"];
	else
		return;

	$digit = 0;
	$speed = 0;
	$numOfset = 0;
	$numOfquest = 0;

	switch($type)
	{
		case "digit":
			$digit = $value;
			break;
		case "speed":
			$speed = $value;
			break;
		case "numOfset":
			$numOfset = $value;
			break;
		case "numOfquest":
			$numOfquest = $value;
			break;
	}


	$qdate = date("Y-m-d");			

		
	$sql = "select quiz_id from `quiz` where accname='$id' and (quiz_date='$qdate' or quiz_date='0000-00-01')";
	$db_of_quizid = $conn->query($sql);	
	

	if ($db_of_quizid->num_rows > 0) {
	
	
		$sql = "update `quiz` set $type='$value' where accname='$id' and 
		(quiz_date='0000-00-01' or quiz_date='$qdate')";		

		$result_of_quiz = $conn->query($sql);			
		
	}
	else
	{
		$sql = "select quiz_id from `quiz` where accname='$id' order by quiz_id desc limit 1";	
		$db_of_quizid = $conn->query($sql);	
		$quiz = $db_of_quizid->fetch_assoc();

		if($quiz['quiz_id'] == '')
			$next_quizid = 1;
		else
			$next_quizid = $quiz['quiz_id'] + 1;	
	

		
	
		$sql = "insert into `quiz`(accname, quiz_id, digit, numOfset, speed, numOfquest, 
		quiz_date, score, hasCorrected) values ('$id', '$next_quizid','$digit','$numOfset',
		'$speed','$numOfquest','0000-00-01', '', -1)";
		
		$result_of_quiz = $conn->query($sql);			
	}


	if ($result_of_quiz === FALSE )
	{	
	
		$statusTab = array("isdone"=>"0");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);
	}
	else
	{
		$statusTab = array("isdone"=>"1");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);	
	}
	$conn->close();
?>
