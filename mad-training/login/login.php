<?php


	include("../mysqli_connect.php");
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message

	/* if _post is defined, then it runs the following code */
	if(isset($_POST['login_submit'])) {
		
		if (empty($_POST['id']) || empty($_POST['pw'])) {
			$error = "您尚未填寫完帳密，請填寫完再按登入";
		}
		else
		{
			$username = $_POST['id'];
			$password = $_POST['pw'];	
			//echo $username;
			//echo $password;			
			/* get rid of backslash */
			//echo $username;
			$username = stripslashes($username);
			$password = stripslashes($password);

			/* prevent sql injection attacks */
			$username = mysqli_real_escape_string($conn,$username);	
			$password = mysqli_real_escape_string($conn,$password);
			
			$password = md5($password);			
		
			$sql = "select * from `account` where password='$password' AND name='$username'";
			$result = $conn->query($sql);			
		
			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				
				$_SESSION['login_user'] = $username;
				$_SESSION['user_type'] = $row["type"]; 
				$_SESSION['user_classno'] = $row["classno"];
				switch ($row["type"]){
					case "0":
						header("location: /platform/webadmin");
						break;
					case "1":
						header("location: /platform/cladmin");
						break;
					case "2":
						header("location: /platform/teacher");
						break;
					case "3":
						header("location: /platform/student");
						break;
				
				}	

			}
			else
				$error = "帳號或者密碼是錯誤的，請確認";
			$conn->close();
		}

	}
?>
