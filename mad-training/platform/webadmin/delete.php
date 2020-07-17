<?php

	include("../../mysqli_connect.php");	
		
	if ( isset($_GET["id_value"]) && $_GET["id_value"]!="" )
		$id = $_GET["id_value"];
	else
		return;

	$sql = "select name from `account` where classno='$id'";
	
	$db_account_data = $conn->query($sql);

	while($account = $db_account_data->fetch_assoc()){
		
		//echo $account['name'];
   		$accname = $account['name'];


		/*  delete data which contains accname in member_data database */
		$sql = "DELETE FROM `member_data` WHERE accunt_name ='$accname'";
		
		$res_of_memdata = $conn->query($sql);
	
		if ($res_of_memdata === FALSE)
			echo "Error: " . $sql . "<br>" . $conn->error;
		
	
		/*  delete data which contains accname in quiz database */
		$sql = "DELETE FROM `quiz` WHERE accname ='$accname'";
		
		$res_of_quiz = $conn->query($sql);
	
		if ($res_of_quiz === FALSE)
			echo "Error: " . $sql . "<br>" . $conn->error;

	}
		
	/*  delete data which contains accname in classno database */
	$sql = "DELETE FROM `account` WHERE classno ='$id'";
		
	$res_of_account = $conn->query($sql);
	
	if ($res_of_account === FALSE)
			echo "Error: " . $sql . "<br>" . $conn->error;

	
	$sql = "DELETE FROM `class` WHERE classno ='$id'";
		
	$res_of_class = $conn->query($sql);
	
	if ($res_of_class === FALSE)
			echo "Error: " . $sql . "<br>" . $conn->error;





	if ($res_of_account === TRUE && $res_of_memdata === TRUE && $res_of_quiz === TRUE && $res_of_class === TRUE)
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
