<?php

	include("../../mysqli_connect.php");	
		
	if ( isset($_GET["id_value"]) && $_GET["id_value"]!="" )
		$id = $_GET["id_value"];
	else
		return;
	$sql = "DELETE FROM `account` WHERE name ='$id'";
	$res_of_account = $conn->query($sql);
	
	if ($res_of_account === FALSE)
		echo "Error: " . $sql . "<br>" . $conn->error;

	$sql = "DELETE FROM `member_data` WHERE accunt_name ='$id'";
	$res_of_memdata = $conn->query($sql);
	
	if ($res_of_memdata === FALSE)
		echo "Error: " . $sql . "<br>" . $conn->error;

	$sql = "DELETE FROM `quiz` WHERE accname ='$id'";
	$res_of_quiz = $conn->query($sql);
	
	if ($res_of_quiz === FALSE)
		echo "Error: " . $sql . "<br>" . $conn->error;

	if ($res_of_account === TRUE && $res_of_memdata === TRUE && $res_of_quiz === TRUE )
	{	
	
		$statusTab = array("isdone"=>"1");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);
	//	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	else
	{
		$statusTab = array("isdone"=>"0");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);	
	}
	//echo "hi";
	$conn->close();
?>
