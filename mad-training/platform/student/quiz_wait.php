<?php
	session_start();
	include('./session.php');
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
	<link rel="stylesheet" type="text/css" href="../../mogocss/icomoon.css" />
<link rel="stylesheet" type="text/css" href="../../mogocss/person.css" />
<link rel="stylesheet" type="text/css" href="../../mogocss/btn.css" />

<script language="JavaScript">
function ShowTime(){
　var NowDate=new Date();
　var h=NowDate.getHours();
　var m=NowDate.getMinutes();
　var s=NowDate.getSeconds();　
　document.getElementById('showbox').innerHTML = h+'時'+m+'分'+s+'秒';
　setTimeout('ShowTime()',1000);
}
</script>
<script language="javascript">
　var Today=new Date();
</script>

</head>

<body onload="ShowTime()">

<div class="logo"></div>
<div class="login-block">



<h1>
<script language="JavaScript" type="text/javascript">
　document.write(" " + Today.getFullYear()+ " 年 " + (Today.getMonth()+1) + " 月 " + Today.getDate() + " 日");
</script>
<div id="showbox"></div>
<br>
<div class="btn" id="begin_quiz_btn">考試開始</div>
<?php
	echo '<input type="hidden" id="quiz_stuid" value="'.$_SESSION['login_user'].'_quiz"';
	echo '<br><br><a href="./">返回</a>';
?>

</h1>

</div>
</div>
        <script type="text/javascript" src="../../mogojs/jquery.min.js"></script>
        <script type="text/javascript" src="../../mogojs/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="../../mogojs/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="../../mogojs/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../mogojs/jquery.hoverdir.js"></script>
        <script type="text/javascript" src="../../mogojs/modernizr.custom.97074.js"></script>
        <script type="text/javascript" src="../../mogojs/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="../../mogojs/unslider-min.js"></script>
	<script type="text/javascript" src="./js/setting.js"></script>
</body>
</html>

