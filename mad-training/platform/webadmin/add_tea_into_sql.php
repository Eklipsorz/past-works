<?php
	include('../../mysqli_connect.php');

	if(isset($_POST['addtea_submit'])) {
			
		if (empty($_POST['account']) || empty($_POST['password'])) {
			$error = "新增帳號時至少要填寫完帳號和密碼，再按送出";
		}
		else
		{
			$id = $_POST['account'];
			$pwd = $_POST['password'];
			$name = $_POST['realname'];
			$sex = $_POST['sex'];
			$birthday = $_POST['birthday'];
			$addr = $_POST['addr'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];

			
			//echo $username;
			//echo $password;			
			/* get rid of backslash */
			//echo $username;
			$id = stripslashes($id);
			$pwd = stripslashes($pwd);
			$name = stripslashes($name);
			$sex = stripslashes($sex);
			$birthday = stripslashes($birthday);
			$addr = stripslashes($addr);
			$phone = stripslashes($phone);
			$email = stripslashes($email);

			/* prevent sql injection attacks */
			$id = mysqli_real_escape_string($conn,$id);	
			$pwd = mysqli_real_escape_string($conn,$pwd);
			$name = mysqli_real_escape_string($conn,$name);
			$sex = mysqli_real_escape_string($conn,$sex);
			$birthday = mysqli_real_escape_string($conn,$birthday);
			$addr = mysqli_real_escape_string($conn,$addr);
			$phone = mysqli_real_escape_string($conn,$phone);
			$email = mysqli_real_escape_string($conn,$email);
			
			session_start();	
			
			$pwd = md5($pwd);			
			$classno =  $_SESSION['current_selected_class'];
		
			//$sql = "select * from `account` where password='$password' AND name='$username'";
			//$result = $conn->query($sql);			
			$sql = "INSERT INTO `account` (classno,name,type,password) VALUES 
			('$classno','$id','2','$pwd')";
			
			
			$res_of_account = $conn->query($sql);
	
			if ($res_of_account === FALSE )
			{	
				$error = "帳號名稱已被人使用，麻煩請確認";
				return ;
			}

			$sql = "INSERT INTO `member_data` (accunt_name, name, addr, phone, email, birthday, 
			school, sex, parent) VALUES ('$id','$name','$addr','$phone','$email','$birthday',
			'','$sex','')";

			$res_of_memdata = $conn->query($sql);

			if ($res_of_memdata === FALSE )
				echo "Error: " . $sql . "<br>" . $conn->error;
			
			if ($res_of_account === TRUE && $res_of_memdata === TRUE)
			{
				echo '<script type="text/javascript">window.opener.location.reload();</script>';
				echo '<script type="text/javascript">window.close();</script>';
			}	
		}

	}
?>
