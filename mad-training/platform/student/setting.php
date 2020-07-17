<?php
	session_start();
	include('./session.php');
	include('test_updata.php');
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
<form id="practice_form" method="post" action="">
	<section>
        <div class="container">
                <div class="row">
                        <div class="col-md-2">  					
<h1>位數</h1>
<select name="digit" id="digit">
　<option value="2">2</option>
　<option value="3">3</option>
<option value="4">4</option>
　<option value="5">5</option>
<option value="6">6</option>
　<option value="7">7</option>
<option value="8">8</option>
</select>
</form>
					   </div>
					   <div class="col-md-2">                              
<h1>口數</h1>
<!--form-->
<select name="numOfset" id="numOfset">
　<option value="2">二</option>
　<option value="3">三</option>
<option value="4">四</option>
<option value="5">五</option>
<option value="6">六</option>
　<option value="7">七</option>
<option value="8">八</option>
　<option value="9">九</option>
<option value="10">十</option>
</select>
<!--/form-->
					   </div>
					   <div class="col-md-2">  
<h1>速度</h1>					   
<!--form-->

<select name="speed" id="speed">
　<option value="2">1倍速</option>
<option value="3">1.5倍速</option>
　<option value="4">2倍速</option>
</select>
					   </div>
 <div class="col-md-2">
<h1>題數</h1>
<select name="maxOfquest" id="maxOfquest">
<option value="1">1</option>　
<option value="2">2</option>
　<option value="3">3</option>
<option value="4">4</option>
　<option value="5">5</option>
<option value="6">6</option>
　<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</form>
                                           </div>
		
		</div>									
		</div>

  </section>

<div class="btn" name="setting_submit" id="begin_practice_btn">練習開始</div>
</form>
<br><a href="./">返回</a>


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

