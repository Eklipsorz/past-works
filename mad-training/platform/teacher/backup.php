<?php

	include("./session.php");
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../../mogocss/chart.css">
</head>

<body>



<div class="logo"></div>
<div class="login-block">

	  <h1 class="nino-sectionHeading">近期成績</h1>
	<?php
 
		session_start();
		echo $_POST['score_owner'];
	?>	
			 <table  border="3" bordercolor="red" align="center">
        <thead align="center">
            <tr bgcolor="#FFB6C1">
                <td width="100"><h3>考試日期</h3></td>
                <td  width="80"><h3>位數</h3></td>
                <td  width="80"><h3>口數</h3></td>
		<td  width="80"><h3>速度</h3></td>
		<td  width="80"><h3>題數</h3></td>				
		<td  width="80"><h3>答對</h3></td>
		<td  width="80"><h3>通過</h3></td>
		<td  width="80"><h3>未訂正</h3></td>				
            </tr>
        </thead>
        <tr  align="center">
            <td>2017-12-03</td>
            <td>3</td>
            <td>三</td>
	    <td>X1</td>
            <td>5題</td>
	   <td>5題</td>
            <td>通過</td>
			<td>0</td>       
        </tr>
        <tr align="center">
            <td>2017-12-04</td>
            <td>3</td>
            <td>四</td>
		<td>X1</td>
 		<td>5題</td>
		<td>2題</td>
            <td>不通過</td>
			<td>0</td>             
        </tr>
        <tr align="center">
            <td>2017-12-05</td>
            <td>3</td>
            <td>四</td>
		<td>X1</td>
		<td>5題</td>
		<td>0題</td>
            <td>不通過</td>
			<td>1</td>         
        </tr>
       
    </table>		

	   
<br><h1 class="nino-sectionHeading">圖表</h1>
	  <div id='Graph' align="center"></div>

<table align="center"><tr align="center"><td><a href="scorelist.php">返回</a></td></tr></table>


</div>

 <script src='http://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>

    <script  src="../../mogojs/chart.js"></script>
</body>
</html>
