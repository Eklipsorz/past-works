<?php
	session_start();
	include('./session.php');
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<link rel="stylesheet" type="text/css" href="../../mogocss/personnb.css" />
	<link rel="stylesheet" type="text/css" href="../../mogocss/btn.css" />
	<link rel="stylesheet" type="text/css" href="./css/practice.css" />
</head>

<body>
<div class="logo"></div>
<div class="login-block">

<table align="center"><tr><td>
<?php
	include('../../mysqli_connect.php');

	$numOfincorr = count($_SESSION['incorrect_question']);

	$_SESSION['numOfincorrect'] = $numOfincorr;	


	if($numOfincorr > 0)
	{
		echo '<h1>答對了 ' . $_SESSION['num_of_correctQuest'] . ' 題!</h1>';
		echo '<h1> 您還有' . $_SESSION['countOfjoinQuiz'] . '次的訂正機會</h1>';
			
		if($_SESSION['countOfjoinQuiz'] > 0)	
		{		
			echo '<button id="correctbtn" onclick="location.href=\'correct.php\'">
			<i class="mdi mdi-replay yu-icon"></i>訂正</button>';
		}
	}
	else
		echo '<h1>  恭喜!! 全部都答對了</h1>';

	$qdate = $_SESSION['madsys_quiz_date'];
	$id =  $_SESSION['login_user']; 
	$numOfcorr = $_SESSION['num_of_correctQuest'];
	$numOfincorr = $_SESSION['numOfincorrect'];	

	$sql = "update `quiz` set hasCorrected='$numOfincorr' where accname='$id' and quiz_date='$qdate'";
	$result = $conn->query($sql);


	$_SESSION['madsys_numOfquest'] = 1;
        $_SESSION['isFirst'] = 1;	
	$_SESSION['num_of_correctQuest'] = 0;
	echo '<button id="exitbtn" onclick="javascript:location.href=\'.\'"><i class="mdi mdi-close yu-icon"></i>離開</button>';
	
	$conn->close();
?>
</td></tr></table>



</div>
</div>
</body>
</html>

