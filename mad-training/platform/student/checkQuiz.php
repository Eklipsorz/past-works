<?php
	include("../../mysqli_connect.php");	
	
	if ( isset($_GET["stu_id_value"]) && $_GET["stu_id_value"]!="" )
		$id = $_GET["stu_id_value"];
	else
		return;
	
	$qdate = date("Y-m-d");			

	$sql = "select * from `quiz` where accname='$id' and quiz_date='$qdate' and score = ''";
	$db_of_quiz = $conn->query($sql);			
	
	if ($db_of_quiz->num_rows > 0) {

		$quiz = $db_of_quiz->fetch_assoc();			
		
		session_start();	
		
		$_SESSION['madsys_numOfquest'] = 1;
		$_SESSION['isFirst'] = 1;
		$_SESSION['madsys_digit'] = $quiz['digit'];
		$_SESSION['madsys_numOfset'] = $quiz['numOfset'];
		$_SESSION['madsys_speed'] = $quiz['speed'];	
		$_SESSION['madsys_maximum'] = $quiz['numOfquest'] + 1;
		$_SESSION['madsys_quiz_date'] = $quiz['quiz_date'];
		$_SESSION['num_of_correctQuest'] = 0;
		$_SESSION['current_question'] = array();

		$_SESSION['incorrect_question'] = array();
		$_SESSION['numOfincorrect'] = 0;
		$_SESSION['countOfjoinQuiz'] = 2;
		
		$statusTab = array("isdone"=>"1");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);	
	}
	else
	{
		$statusTab = array("isdone"=>"0");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);	

	}

	$conn->close();
?>
