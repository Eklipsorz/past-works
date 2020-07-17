<?php
	include('./mysqli_connect.php');
	
	if(isset($_POST['UpdateProfile'])) {
			
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
			$school = $_POST['school'];
			$parent = $_POST['parent'];	

			/*echo $id;
			echo " $pwd";
			echo " $name";
			echo " $sex";
			echo " $birthday";
			echo " $addr";
			echo " $phone";
			echo " $email";
			echo " $school";
			echo " $parent";			
			*/
	

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
			$school = stripslashes($school);
			$parent = stripslashes($parent);
			
			/* prevent sql injection attacks */
			$id = mysqli_real_escape_string($conn,$id);	
			$pwd = mysqli_real_escape_string($conn,$pwd);
			$name = mysqli_real_escape_string($conn,$name);
			$sex = mysqli_real_escape_string($conn,$sex);
			$birthday = mysqli_real_escape_string($conn,$birthday);
			$addr = mysqli_real_escape_string($conn,$addr);
			$phone = mysqli_real_escape_string($conn,$phone);
			$email = mysqli_real_escape_string($conn,$email);
			$school = mysqli_real_escape_string($conn,$school);
			$parent = mysqli_real_escape_string($conn,$parent);	
		
			$sql = "select * from `account` where name='$id'";
			$db_account = $conn->query($sql);
			$account = $db_account->fetch_assoc();			
			
		
			if ($pwd == "defaultpwd")
				$pwd = $account['password'];
			else		
				$pwd = md5($pwd);			
		
			$sql = "update `account` set password='$pwd' where name='$id'";
			$res_of_account = $conn->query($sql);			
			
			$sql = "update `member_data` set name='$name', addr='$addr', phone='$phone',
			email='$email', birthday='$birthday', school='$school', sex='$sex', parent='$parent'
			where accunt_name='$id'";	

			$res_of_memdata = $conn->query($sql);	
			
			if ($res_of_account === TRUE && $res_of_memdata === TRUE)
			{
		
				echo '<script type="text/javascript">alert("資料已更新完畢");</script>';
				echo '<script type="text/javascript">history.go(-2);</script>';
			}
		}

	}
?>
