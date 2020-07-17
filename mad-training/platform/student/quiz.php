<?php
	session_start();
	echo $madsys_numOfquest;
	include('./quiz_playVoice.php');
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
	<link rel="stylesheet" type="text/css" href="./css/practice.css" />
<script>
x=0
y=-1

function countMin( )
{　y=y+1
　 document.displayMin.displayBox.value=y
　 setTimeout("countMin( )",60000)
}

function countSec( )
{　x = x + 1
　 z =x % 60
　 document.displaySec.displayBox.value=z
　 setTimeout("countSec( )", 1000)
}
</script>
<script type="text/javascript">
	function ConfirmClose()
   	{
       		if ((event.clientY < 0) ||(event.altKey) ||(event.ctrlKey)||((event.clientY < 129) && (event.clientY>107)))
        	{
//event.altKey When press Alt +F4
//event.ctrlKey When press Ctrl +F4
//event.clientY 107 or 129 is  Alt F4 postion on window screen it may change base on screen resolution
		alert('window closing');
        	}
    	}
	</script>

</head>

<body topmargin='0'  onbeforeunload="ConfirmClose()">
<div class="logo"></div>


<table align=center> <tr valign=top> <td> 已練習時間: </td>

<td> <form name=displayMin>
<input type="text" name="displayBox" value="0" size=2 >
</form> </td>
<td> 分 </td>

<td> <form name=displaySec> </td>
<td> <input type="text" name="displayBox" value="0" size=2 >
</form> </td>
<td> 秒。</td> </tr> </table>


<div class="login-block">

<!--h1>第一題</h1-->
<form action="" method="post">
<?php echo '<h1>第' . $_SESSION['madsys_numOfquest'] . '題</h1>'   ?>
<h2 align="center">答案: <input type="text" name="answer" size="10" align="middle" maxlength="8"/></h2>






<script>
countMin( )
countSec( )
</script>

<!--button type="button" onclick="location.href='#'">送出</button-->
<button id="madsys_submit" name="madsys_submit">送出</button>

<div style="text-align: center; color: red; font-size:20px">
	<span><?php echo $error; ?></span>
</div>

<!--a href="pre_score.html">成績</a-->
</form>

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
	<script type="text/javascript" src="./js/practice.js"></script>
	

</body>
</html>
