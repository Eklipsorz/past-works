<?php

	include("../../mysqli_connect.php");	
	
	if ( isset($_GET["id_value"]) && $_GET["id_value"]!="" )
		$id = $_GET["id_value"];
	else
		return;

	if ( isset($_GET["clname_value"]) )
		$clname = $_GET["clname_value"];
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
	

	
	
	$sql = "update `class` set clname='$clname', address='$addr', phone='$phone' where classno='$id'";
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
