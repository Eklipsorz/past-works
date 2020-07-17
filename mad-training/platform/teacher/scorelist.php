<?php

//	include("./input.php");
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ninodezign.com, ninodezign@gmail.com">
        <meta name="copyright" content="ninodezign.com">
        <title>MAD training</title>

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
        <link rel="stylesheet" type="text/css" href="../../mogocss/template.css" />
    	<link rel="stylesheet" type="text/css" href="../../mogocss/btn.css" />
    	<link rel="stylesheet" type="text/css" href="../../mogocss/dropdownMenu.css" />
    	<link rel="stylesheet" type="text/css" href="./css/teacher.css" />
	    <script src="https://use.fontawesome.com/484df5253e.js"></script>
</head>

<body data-target="#nino-navbar" data-spy="scroll">

        <!-- Header
    ================================================== -->
        <header id="nino-header">
                <div id="nino-headerInner">
                        <nav id="nino-navbar" class="navbar navbar-default" role="navigation">
                                <div class="container">
                                        <div class="navbar-header"><a class="navbar-brand" href="index.html">MAD training</a></div>
                                        <div class="nino-menuItem pull-right">
												<div class="collapse navbar-collapse pull-left" id="nino-navbar-collapse">
                                                        <ul class="nav navbar-nav">
                                                                <li><a href="./">首頁</a></li>                                                             
														
	<li class="dropdown">
      <a href="#" class="mdi mdi-account nino-icon fsr"></a>
      <ul class="dropdown-menu">
	<div style="width:12vw;height:5vh;line-height:5vh;">
		<?php
			echo '<span style="width: 100%; position: relative; left: 12%;">
			目前帳號：'.$_SESSION['login_user'].'</span>';	
		?>
		<div style="position: relative; min-height: 0px;">
		<hr style="position: absolute;left: 0;bottom: 0;width: 100%;margin: 0;">
		</div>
	</div>
	<li><i class="icon-arrow-down"></i><a href="../../profile.php">個人資料</a></li>
        <li><i class="icon-arrow-up"></i><a href="#" id="logout">登出</a></li>
	</ul>
	</li>
                                                        </ul>
                                                </div>               
                                        </div>
                                </div>
                        </nav>
					</div>
			</header>
    <!-- header
    ================================================== -->
	<!--   http://css3buttongenerator.com/   -->

<h1 class="nino-sectionHeading">考試管理</h1>
<h1> <table  border="3" bordercolor="#FFF" align="center">

	<?php
			       
		include("../../mysqli_connect.php");	
		session_start();
		$user_classno = $_SESSION['user_classno'];		
		
		$sql = "select * from `account` where type='3' AND classno='$user_classno'";
		$db_account_data = $conn->query($sql);	
		while($account = $db_account_data->fetch_assoc()){
		
			$accname = $account['name'];	
			$sql = "select * from `member_data` where accunt_name='$accname'";
			$db_member_data = $conn->query($sql);
			$memdata = $db_member_data->fetch_assoc();			
			
			echo '<tr align="center"> <td bgcolor="#FFB6C1">' . $memdata['name'] .'</td>';
			echo '<td><button class="slistbtn" id="'.$account['name'].'_sclist">
			<i class="mdi mdi-chart-line"></i></button></td>';
		}
	
		$conn->close();
	?>
 
        <!--tr  align="center">
            <td bgcolor="#FFB6C1">林林林</td>    
            <td><button id="prebtn" onclick="location.href='tea_score.html'"><i class="mdi mdi-chart-line"></i></button></td>
        </tr-->
        

    </table></h1>		

	
	
	<!-- ================================================== -->
        <!-- javascript -->
        <script type="text/javascript" src="../../mogojs/jquery.min.js"></script>
        <script type="text/javascript" src="../../mogojs/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="../../mogojs/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="../../mogojs/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../mogojs/jquery.hoverdir.js"></script>
        <script type="text/javascript" src="../../mogojs/modernizr.custom.97074.js"></script>
        <script type="text/javascript" src="../../mogojs/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="../../mogojs/unslider-min.js"></script>
        <script type="text/javascript" src="./js/teacher.js"></script>
        <script type="text/javascript" src="../../mogojs/dropdownMenu.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- css3-mediaqueries.js for IE less than 9 -->
        <!--[if lt IE 9]>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->

</body>
</html>

