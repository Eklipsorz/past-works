<?php
	
	
	include("../mysqli_connect.php");
	

	if ( isset($_GET["real_clname"]) && $_GET["real_clname"]!="" )
		$classname = $_GET["real_clname"];
	else
		return;


	if ( isset($_GET["classno"]) && $_GET["classno"]!="" )
		$classno = $_GET["classno"];
	else
		return;
	

	if ( isset($_GET["location_select"]) && $_GET["location_select"]!="" )
		$location = $_GET["location_select"];
	else
		return;

	
	if ( isset($_GET["phonenumber"]) && $_GET["phonenumber"]!="" )
		$phonenumber = $_GET["phonenumber"];
	else
		return;

	if ( isset($_GET["address"]) && $_GET["address"]!="" )
		$address = $_GET["address"];
	else
		return;


	if ( isset($_GET["cladmin_account"]) && $_GET["cladmin_account"]!="" )
		$cladmin_account = $_GET["cladmin_account"];
	else
		return;
	

	if ( isset($_GET["cladmin_password"]) && $_GET["cladmin_password"]!="" )
	{
		$cladmin_pwd = $_GET["cladmin_password"];
		//$cladmin_pwd = password_hash($cladmin_pwd, PASSWORD_DEFAULT);
		$cladmin_pwd = md5($cladmin_pwd);
	}
	else
		return;


	if ( isset($_GET["cladmin_email"]) && $_GET["cladmin_email"]!="" )
		$cladmin_email = $_GET["cladmin_email"];
	else
		return;
	

	if ( isset($_GET["cladmin_name"]) && $_GET["cladmin_name"]!="" )
		$cladmin_name = $_GET["cladmin_name"];
	else
		return;
	

	if ( isset($_GET["cladmin_addr"]) && $_GET["cladmin_addr"]!="" )
		$cladmin_addr = $_GET["cladmin_addr"];
	else
		return;
	
	
	if ( isset($_GET["cladmin_phone"]) && $_GET["cladmin_phone"]!="" )
		$cladmin_phone = $_GET["cladmin_phone"];
	else
		return;
	
	
	//$sql = "INSERT INTO `member` (account,password,classno,name,sex,addr,phone,email,birthday,parent,school)
	//VALUES ('$cladmin_account','$cladmin_pwd','$classno','$cladmin_name',0,'$cladmin_adr','$cladmin_phone',	
	//'$cladmin_email',0000-00-00,'','')";
	$sql = "INSERT INTO `account` (classno,name,type,password) VALUES ('$classno','$cladmin_account','1',
	'$cladmin_pwd')";
	
	$res_of_account = $conn->query($sql);
	
	if ($res_of_account === FALSE )
	{	
		$status = 2;
		$statusTab = array("isdone"=>$status);	
		echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);
		return;	
	}

	/*********/

	$sql = "INSERT INTO `member_data` (accunt_name, name, addr, phone, email, birthday, school, sex, parent)
	VALUES ('$cladmin_account','$cladmin_name','$cladmin_adr','$cladmin_phone','$cladmin_email',0000-00-00,
	'',0,'')";

	$res_of_memdata = $conn->query($sql);

	if ($res_of_memdata === FALSE )
		echo "Error: " . $sql . "<br>" . $conn->error;
		

	/*********/
	$sql = "INSERT INTO `class` (classno,clname,location,phone,address) VALUES 
	('$classno','$classname','$location','$phonenumber','$address')";
	
	$res_of_class = $conn->query($sql);	
	
	if ($res_of_class === FALSE )
		echo "Error: " . $sql . "<br>" . $conn->error;

	if ($res_of_account === TRUE && $res_of_memdata === TRUE && $res_of_class === TRUE) {
		$status = "0";
	}
	else
		$status = "1";
	$statusTab = array("isdone"=>$status);	
	echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);
	
	$conn->close();

?>
