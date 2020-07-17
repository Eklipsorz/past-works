<?php

	include("../../mysqli_connect.php");	
	

	if ( isset($_GET["stu_id_value"]) && $_GET["stu_id_value"]!="" )
		$id = $_GET["stu_id_value"];
	else
		return;
	
	if ( isset($_GET["transmode"]) && $_GET["transmode"]!="" )
		$mode = $_GET["transmode"];
	else
		return;

	$qdate = date("Y-m-d");			
	
	if($mode)
	{

		$sql = "update `quiz` set quiz_date='$qdate' where accname='$id' and quiz_date='0000-00-01'";
		$result_of_quiz = $conn->query($sql);			
		$statusTab = array("isdone"=>"1");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);	


	}
	else
	{
		$sql = "update `quiz` set quiz_date='0000-00-01' where accname='$id' and quiz_date='$qdate'";	
		$result_of_quiz = $conn->query($sql);			
		$statusTab = array("isdone"=>"0");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);

	}

/*	if ($result_of_quiz === FALSE )
	{	
	
	}
	else
	{
	}
*/	$conn->close();
?>
