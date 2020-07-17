<?php

	include("./session.php");
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
                                        <div class="navbar-header"><a class="navbar-brand" href="../../index.html">MAD training</a></div>
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

			<h1 class="nino-sectionHeading">學生管理</h1>
	<!--table  id="stuTab"  align="center"-->
      	<table border="3" id="stuTab" align="center">
	<thead align="center">
            <tr bgcolor="#FFB6C1">
                <td width="60"><h3>姓名</h3></td>
                <td  width="100"><h3>帳號</h3></td>
                <td  width="100"><h3>家長姓名</h3></td>
				<td  width="60"><h3>國小</h3></td>
				<td  width="50"><h3>性別</h3></td>
				<td  width="100"><h3>生日</h3></td>
				<td  width="300"><h3>地址</h3></td>
				<td  width="100"><h3>電話</h3></td>
				<td  width="100"><h3>mail</h3></td>
                <td  width="60"><h3>編輯</h3></td>
            </tr>
        </thead>
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
			
			echo '<tr align="center">';
			
			echo  '<td width="8%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="11" name="realname" class="txtbox" value="" id="' 
			. $account['name'] . '_name" disabled>'.$memdata['name'].'</textarea></div></div></td>';			
			
			echo  '<td> <div class="editarea"> <textarea rows="2" cols="12" name="stuid" 
			class="txtbox" value="" id="' . $account['name'] . '_name" 
			disabled>'.$account['name'].'</textarea></div></td>';			
			
			echo  '<td> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" name="parent" class="txtbox" value="" id="' 
			. $account['name'] . '_parent" disabled>'.$memdata['parent'].'</textarea>
			</div></div></td>';			
			
			
			echo  '<td width="9%"><div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" name="school" class="txtbox" value="" id="' 
			. $account['name'] . '_school" disabled>'.$memdata['school'].' </textarea></div></td>';			

			
			echo  '<td><div class="' . $account['name'] . '"><div class="editarea"> 
			<textarea rows="2" cols="3" name="sex" class="txtbox" value="" id="' 
			. $account['name'] . '_sex" disabled>'.$memdata['sex'].'</textarea></div></td>';			
			
			echo  '<td> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" name="birthday" class="txtbox" value="" id="' 
			. $account['name'] . '_birthday" disabled>'.$memdata['birthday'].'</textarea>
			</div></td>';			
				
			echo  '<td> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="45" name="addr" class="txtbox" value="" id="' 
			. $account['name'] . '_addr" disabled>'. $memdata['addr'].'</textarea>
			</div></td>'; 

			echo  '<td> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" name="phone" class="txtbox" value="" id="' 
			. $account['name'] . '_phone" disabled>'.$memdata['phone'].'</textarea>
			</div></td>';			

			//echo  '<td> <input type="text" size="13" style="text-align: center;" name="email"  
			//value="' . $memdata['email'] . '"readonly id="' .$account['name'] . '_email"> </td>';
			echo  '<td width="16%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="27" name="email" class="txtbox" value="" id="' 
			. $account['name'] . '_email" disabled>'.$memdata['email'].'</textarea>
			</div></td>';

			echo  '<td><button class="editbtn" id="' . $account['name'] . '"><i class="mdi mdi-pencil">
			</i></button> <button class="donebtn" id="' . $account['name'] .'_done" disabled>
			<i class="mdi mdi-check"></i></button></td>';
			
			echo  '</tr>';
		} 
		$conn->close();
	?>

    </table>		

	
	
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
        <script type="text/javascript" src="../../mogojs/testtemplate.js"></script>
	<script type="text/javascript" src="js/teacher.js"</script>
	<script type="text/javascript" src="../../mogojs/calender.js"></script>
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


