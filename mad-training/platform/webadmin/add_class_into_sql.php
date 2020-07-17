<?php
	include('../../mysqli_connect.php');

	if(isset($_POST['addclass_submit'])) {
			
		if (empty($_POST['account']) || empty($_POST['password'])) {
			$error = "新增帳號時至少要填寫完帳號和密碼，再按送出";
		}
		else
		{
			$id = $_POST['account'];
			$pwd = $_POST['password'];
			$location = $_POST['location'];
			$classno = $_POST['classno'];
			$clname = $_POST['clname'];
			$addr = $_POST['addr'];
			$phone = $_POST['phone'];

			
			//echo $username;
			//echo $password;			
			/* get rid of backslash */
			//echo $username;
			$id = stripslashes($id);
			$pwd = stripslashes($pwd);
			$location = stripslashes($location);
			$classno = stripslashes($classno);
			
			$clname = stripslashes($clname);
			$addr = stripslashes($addr);
			$phone = stripslashes($phone);

			/* prevent sql injection attacks */
			$id = mysqli_real_escape_string($conn,$id);	
			$pwd = mysqli_real_escape_string($conn,$pwd);
			$location = mysqli_real_escape_string($conn,$location);
			$classno = mysqli_real_escape_string($conn,$classno);
			$clname = mysqli_real_escape_string($conn,$clname);
			$addr = mysqli_real_escape_string($conn,$addr);
			$phone = mysqli_real_escape_string($conn,$phone);
			
			
			$pwd = md5($pwd);			
		
			$sql = "select * from `class` where classno='$classno'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

				$error = "補習班已被註冊，麻煩請確認";
				return ;

			}
			
			$sql = "select * from `account` where name='$id'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {

				$error = "帳號名稱已被註冊，麻煩請確認";
				return ;

			}


			$sql = "INSERT INTO `class` (classno,clname,location,phone,address) VALUES 
			('$classno','$clname','$location','$phone','$addr')";
			
			$result = $conn->query($sql);
				
			$sql = "INSERT INTO `account` (classno,name,type,password) VALUES 
			('$classno','$id','1','$pwd')";
			
			$result = $conn->query($sql);
				
			echo '<script type="text/javascript">window.opener.location.reload();</script>';
			echo '<script type="text/javascript">window.close();</script>';
		}

	}
?>
