<!DOCTYPE html>
<?php
	include('login.php'); // Includes Login Script
	
	if(isset($_SESSION['login_user'])){
		switch ($_SESSION['user_type']){
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

?>
<html lang="zh-hant-TW">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MAD training login</title>
	
	<!-- favicon -->
    <link rel="shortcut icon" href="images/ico/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../mogocss/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../mogocss/template.css" />
	<link rel="stylesheet" type="text/css" href="css/login.css" />


</head>

<body>



<div class="logo"></div>
<div class="login-block">
	<h1>登入</h1>
	<form id="login_form" method="post" action="">
	<fieldset id="main_form">
		<input type="text" value="" placeholder="帳號" id="username" name="id" />
    		<input type="password" value="" placeholder="密碼" id="password" name="pw" />
		<button id="login_submit" name="login_submit">登入</button>
		<div style="text-align: center; color: red">
			<span><?php echo $error; ?></span>
		</div>
	</fieldset>
	</form>
	
	<div style="text-align:center;"><a href="../" align="center">回首頁</a></div>
	
</div>
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>	
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>

