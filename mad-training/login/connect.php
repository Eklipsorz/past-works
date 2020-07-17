<?php
//連接資料庫
	include("../mysqli_connect.php");
	
	$id = $_GET['id'];
	$pw = $_GET['pw']; 
	
	$sql = "select * from class_admin where account='$id' and password='$pw'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		echo 1;
	/*while($row = $result->fetch_assoc()) {
        		echo "account: " . $row["account"]. " - password: " . $row["password"]. " " . $row["lastname"]. "<br>";
    		}
	*/	
	}else {
		echo 0;
	}

	$conn->close();
#$sql = "SELECT * FROM member_table where username = '$id'";
#$result = mysql_query($sql);
#$row = @mysql_fetch_row($result); 
#if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
#{ 
 #       $_SESSION['username'] = $id;
 #       echo '登入成功!';
 #       echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
#}
#else
#{
 #       echo '登入失敗!';
  #      echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
//}
?>
