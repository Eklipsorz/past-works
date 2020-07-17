<?php

	include("../../mysqli_connect.php");	
	
	if ( isset($_GET["id_value"]) && $_GET["id_value"]!="" )
		$id = $_GET["id_value"];
	else
		return;

	if ( isset($_GET["name_value"]) )
		$name = $_GET["name_value"];
	else
		return;
	
	
	if ( isset($_GET["parent_value"]))
		$parent = $_GET["parent_value"];
	else
		return;
	
	
	if ( isset($_GET["school_value"]) )
		$school = $_GET["school_value"];
	else
		return;
	
	if ( isset($_GET["sex_value"]) )
		$sex = $_GET["sex_value"];
	else
		return;

	if ( isset($_GET["birthday_value"]) )
		$birthday = $_GET["birthday_value"];
	else
		return;

	if ( isset($_GET["addr_value"]) )
		$addr = $_GET["addr_value"];
	else
		return;
	
	if ( isset($_GET["phone_value"]))
		$phone = $_GET["phone_value"];
	else
		return;
	
	if ( isset($_GET["email_value"]))
		$email = $_GET["email_value"];
	else
		return;

	$sql = "update `member_data` set name='$name', addr='$addr', phone='$phone', email='$email',
	birthday='$birthday', school='$school', sex='$sex', parent='$parent' where accunt_name='$id'";
	
	$res_of_update = $conn->query($sql);

	if ($res_of_update === FALSE )
	{	
	
		$statusTab = array("isdone"=>"0");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);
//		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	else
	{
		$statusTab = array("isdone"=>"1");	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);	
	}
	//echo "hi";
	$conn->close();
?>
