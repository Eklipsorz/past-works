<?php

	include("../../mysqli_connect.php");	
		
	if ( isset($_GET["id_value"]) && $_GET["id_value"]!="" )
		$id = $_GET["id_value"];
	else
		return;
	
	$pwd = md5($id);

	$sql = "UPDATE `account` SET password = '$pwd' WHERE name ='$id'";
	$res_of_account = $conn->query($sql);
	
	if ($res_of_account === FALSE)
		echo "Error: " . $sql . "<br>" . $conn->error;

	if ($res_of_account === TRUE){
	
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
