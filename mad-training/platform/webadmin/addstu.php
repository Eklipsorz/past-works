<?php
	include('add_stu_into_sql.php');
?>

<!DOCTYPE html>
<div id="toNewWindow">
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
	<link rel="stylesheet" type="text/css" href="../../mogocss/icomoon.css" />
<link rel="stylesheet" type="text/css" href="../../mogocss/person.css" />
</head>

<body>



<div class="logo"></div>
<div class="login-block">
    <h1>新增學生資料</h1>

<form action="" method="post">
	 <div class="nino-followUs">
   <div class="socialNetwork">
	<div style="text-align: center; color: red">
		<span style="font-size:28px;"><?php echo $error; ?></span>
	</div>
                                                <h3>
<div class="col-md-auto"> <i class="mdi mdi-account yu-icon"></i><span>帳號:</span> <input type="text" name="account"/> </div>
<div class="col-md-auto">  <i class="mdi mdi-key yu-icon"></i><span>密碼:</span> <input type="password" name="password"/> </div>
<div class="col-md-auto"> <i class="mdi mdi-account-card-details yu-icon"></i><span>姓名:</span> <input type="text" name="realname" size="8"/> </div>
<div class="col-md-auto"> <i class="mdi mdi-human-male-female yu-icon"></i><span>性別:</span>
 <select name="sex"><option value="男">男</option><option value="女">女</option></select> <p></div>
<div class="col-md-auto"> <i class="mdi mdi-cake-variant yu-icon"></i><span>生日:</span> <input type="text" size="12" placeholder="yyyy-mm-dd" value="0000-00-00" name="birthday"/> </div>
<div class="col-md-auto"> <i class="mdi mdi-account-multiple-outline yu-icon"></i><span>家長:</span> <input type="text" size="4" name="parent"/></div>
<div class="col-md-auto"> <i class="mdi mdi-book-open-variant yu-icon"></i><span>就讀:</span> <input type="text" size="4" name="school"/>國小 </div>
 <div class="col-md-auto">  <i class="mdi mdi-phone yu-icon"></i><span>電話:</span>  <input type="text"  size="12" name="phone"/>  </div>                                                                      
 <div class="col-md-auto"><i class="mdi mdi-email yu-icon"></i><span>Email:</span> <input type="text"  size="25" name="email"/></div> 
<div class="col-md-auto"> <i class="mdi mdi-map-marker yu-icon"></i><span>地址:</span> <input type="text" size="40" name="addr"/> </div>

                                              </h3>
                                        </div>

	
    <button id="addstu_submit" name="addstu_submit">送出</button>

</div>
</div>
</form>
</body>
</html>
</div>
