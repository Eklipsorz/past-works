<?php
	include("../../login/SessionCheck.php");
	session_start();	
	if($_SESSION['user_type'] != 3)
		header("location: /");
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	    <script src="https://use.fontawesome.com/484df5253e.js"></script>
</head>

<body data-target="#nino-navbar" data-spy="scroll">

        <!-- Header
    ================================================== -->
        <header id="nino-header">
                <div id="nino-headerInner">
                        <nav id="nino-navbar" class="navbar navbar-default" role="navigation">
                                <div class="container">
                                        <div class="navbar-header"><a class="navbar-brand" href="../../index.html">MAD training</a></div>
                                        <div class="nino-menuItem pull-right">
					<div class="collapse navbar-collapse pull-left" id="nino-navbar-collapse">
                               <ul class="nav navbar-nav">
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
	<section>
        <div class="container">
                <div class="row">
                        <div class="col-md-4">  					
							<div class="btn" onclick="location.href='quiz_wait.php'">考試</div>
					   </div>
					   <div class="col-md-4">                              
							<div class="btn" onclick="location.href='setting.php'">練習</div>
					   </div>
					   <div class="col-md-4">                              
							<div class="btn" onclick="location.href='myscore.php'">成績</div>
					   </div>
				</div>									
		</div>

  </section>
	
	
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

 	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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


