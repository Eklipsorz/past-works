<?php
	include('./session.php');
	session_start();

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
	<link rel="stylesheet" type="text/css" href="../../mogocss/personnb.css" />
	<link rel="stylesheet" type="text/css" href="../../mogocss/btn.css" />
	<link rel="stylesheet" type="text/css" href="./css/practice.css" />
</head>

<body>
<div class="logo"></div>
<div class="login-block">

<?php

	echo '<h1>答對了 ' . $_SESSION['num_of_correctQuest'] . ' 題!</h1>';
?>
<table align="center"><tr><td>
<button id="exitbtn" onclick="window.close();"><i class="mdi mdi-close yu-icon"></i>離開</button>
</td></tr></table>



</div>
</div>
</body>
</html>

