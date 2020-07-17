<?php

	include("../../mysqli_connect.php");	
	
	if ( isset($_GET["stu_id_value"]) && $_GET["stu_id_value"]!="" )
		$id = $_GET["stu_id_value"];
	else
		return;

	if ( isset($_GET["stu_name_value"]) )
		$name = $_GET["stu_name_value"];
	else
		return;
	
	
	if ( isset($_GET["stu_parent_value"]))
		$parent = $_GET["stu_parent_value"];
	else
		return;
	
	
	if ( isset($_GET["stu_school_value"]) )
		$school = $_GET["stu_school_value"];
	else
		return;
	
	if ( isset($_GET["stu_sex_value"]) )
		$sex = $_GET["stu_sex_value"];
	else
		return;

	if ( isset($_GET["stu_birthday_value"]) )
		$birthday = $_GET["stu_birthday_value"];
	else
		return;

	if ( isset($_GET["stu_addr_value"]) )
		$addr = $_GET["stu_addr_value"];
	else
		return;
	
	if ( isset($_GET["stu_phone_value"]))
		$phone = $_GET["stu_phone_value"];
	else
		return;
	
	if ( isset($_GET["stu_email_value"]))
		$email = $_GET["stu_email_value"];
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
