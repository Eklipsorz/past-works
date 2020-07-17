<?php
	session_start();	
	include('./update_profile.php');
	
	if(!(isset($_SESSION['login_user'])))
		header("location: ..");

?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ninodezign.com, ninodezign@gmail.com">
	<meta name="copyright" content="ninodezign.com"> 
	<title>MAD training login</title>
	
	<!-- favicon -->
    <link rel="shortcut icon" href="../../images/ico/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../images/ico/apple-touch-icon-57-precomposed.png">
	
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../../mogocss/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../mogocss/materialdesignicons.min.css" />
	<link rel="stylesheet" type="text/css" href="../../mogocss/jquery.mCustomScrollbar.min.css" />
	<link rel="stylesheet" type="text/css" href="../../mogocss/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" href="../../mogocss/unslider.css" />
	<link rel="stylesheet" type="text/css" href="../../mogocss/template.css" />
<link rel="stylesheet" type="text/css" href="../../mogocss/person.css" />
</head>

<body>



<div class="logo"></div>
<div class="login-block">
<h1>學生詳細資料</h1>

<form action="" method="post">
	 <div class="nino-followUs">
   <div class="socialNetwork">
 <h3>
<?php
	
		include("./mysqli_connect.php");	
		
		
		$accname = $_SESSION['login_user'];
		$sql = "select * from `member_data` where accunt_name='$accname'";
		$db_member_data = $conn->query($sql);
		$memdata = $db_member_data->fetch_assoc();			
	
		echo '<div class="col-md-auto">
				<i class="mdi mdi-account yu-icon"></i><span>帳號:</span> 
				<input type="text" name="account" value="'.$accname.'" readonly/> 
		</div>';


		
		echo '<div class="col-md-auto">  
				<i class="mdi mdi-key yu-icon"></i><span>密碼:</span> 
				<input type="password" name="password" value="defaultpwd"/> 
		</div>';

		echo '<div class="col-md-auto">
	 			<i class="mdi mdi-account-card-details yu-icon"></i>
				<span>姓名:</span> <input type="text" name="realname" size="8" 
				value="'.$memdata['name'].'"/> 
		</div>';

	  	 echo '<div class="col-md-auto"> 
				<i class="mdi mdi-human-male-female yu-icon"></i>
				<span>性別:</span>
 				<select name="sex">
					<option value="'.$memdata['sex'].'">'.$memdata['sex'].'</option>
					<option value="男">男</option>
					<option value="女">女</option>
				</select> <p>
		</div>';

		echo '<div class="col-md-auto"> 
				<i class="mdi mdi-cake-variant yu-icon"></i>
				<span>生日:</span> <input type="text" size="12" placeholder="yyyy-mm-dd" 
				value="'.$memdata['birthday'].'" name="birthday"/> 
		</div>';

		echo '<div class="col-md-auto"> 
				<i class="mdi mdi-account-multiple-outline yu-icon"></i>
				<span>家長:</span> <input type="text" size="4" name="parent" 
				value="'.$memdata['parent'].'"/>
		</div>';

		echo '<div class="col-md-auto"> 
				<i class="mdi mdi-book-open-variant yu-icon"></i>
				<span>就讀:</span> <input type="text" size="4" name="school" 
				value="'.$memdata['school'].'"/>國小 
		</div>';
 
		echo '<div class="col-md-auto">  
				<i class="mdi mdi-phone yu-icon"></i>
				<span>電話:</span>  <input type="text"  size="12" name="phone" 
				value="'.$memdata['phone'].'"/>  
		</div>';                                                                      

		echo '<div class="col-md-auto">
				<i class="mdi mdi-email yu-icon"></i>
				<span>Email:</span> <input type="text"  size="30" name="email" 
				value="'.$memdata['email'].'"/>
		</div>'; 

		echo '<div class="col-md-auto"> 
				<i class="mdi mdi-map-marker yu-icon"></i>
				<span>地址:</span> <input type="text" size="40" name="addr" 
				value="'.$memdata['addr'].'"/> 
		</div>';


		$conn->close();
?>
 </h3>
 </div> 
  
    <button id="UpdateProfile" name="UpdateProfile">送出</button>

</div>
</div>
</form>
</body>
</html>

