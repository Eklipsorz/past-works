<?php
	session_start();
	include('./session.php');	
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

	<h1 class="nino-sectionHeading">今日考試設定</h1>
	<table  border="3" bordercolor="red" align="center" id="quizTab">
        <thead align="center">
            <tr bgcolor="#FFB6C1">
                <td width="100"><h3>今日考試</h3></td>
               <td width="100"><h3>考試狀態</h3></td>
                <td width="80"><h3>姓名</h3></td>
                <td  width="80"><h3>位數</h3></td>
                <td  width="80"><h3>口數</h3></td>
		<td  width="80"><h3>速度</h3></td>
                <td  width="80"><h3>題數</h3></td>            
            </tr>
        </thead>
	<?php
		
		include("../../mysqli_connect.php");	
		
		$user_classno = $_SESSION['user_classno'];		
		
		$sql = "select * from `account` where type='3' AND classno='$user_classno'";
		$db_account_data = $conn->query($sql);	
		while($account = $db_account_data->fetch_assoc()){
		
			$accname = $account['name'];	
			$sql = "select * from `member_data` where accunt_name='$accname'";
			$db_member_data = $conn->query($sql);
			$memdata = $db_member_data->fetch_assoc();			
			
		


			$qdate = date("Y-m-d");			
	
			$sql = "select * from `quiz` where accname='$accname' and 
			(quiz_date='$qdate' or quiz_date='0000-00-01')";	
		
			$db_quiz = $conn->query($sql);
			$quiz = $db_quiz->fetch_assoc();			
	
			if ($quiz['score'] != "") 
				$para = "disabled";	
			else
				$para = "";
			
			$quiz_speed = $quiz['speed']/2;
		
			
			echo '<tr  align="center">';
           		echo '<td><input name="col" type="checkbox" value="50" class="quiz_chkbox" 
			id="'.$account['name'].'_chkbox" '.$para.'/>選取</td>';
		
			if ($para === "disabled") 
				echo '<td>已考完試</td>';
			else
				echo '<td>尚未考試</td>';
			
			
            		echo '<td>'.$memdata['name'].'</td>';
            		echo '<td>
				<select id="'.$account['name'].'_digit" class="quiz_selector" 
				style="width:6em" '.$para.'>
					<option value="'.$quiz['digit'].'">'.$quiz['digit'].'</option>
  					<option value="2">2</option>
  					<option value="3">3</option>
  					<option value="4">4</option>
  					<option value="5">5</option>
  					<option value="6">6</option>
  					<option value="7">7</option>
  					<option value="8">8</option>
				</select>
			    </td>';
            		
			echo '<td>
				<select id="'.$account['name'].'_numOfset" class="quiz_selector" 
				style="width:6em" '.$para.'>
					<option value="'.$quiz['numOfset'].'">'.$quiz['numOfset'].'</option>
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
			    </td>';
			
			echo '<td>
				<select id="'.$account['name'].'_speed" class="quiz_selector"
				style="width:6em" '.$para.'>
					<option value="'.$quiz['speed'].'">'.$quiz_speed.'倍速</option>
  					<option value="2">1倍速</option>
  					<option value="3">1.5倍速</option>
  					<option value="4">2倍速</option>
				</select>
			    </td>';
			
			echo '<td>
				<select id="'.$account['name'].'_numOfquest" class="quiz_selector" 
				style="width:6em" '.$para.'>
					<option value="'.$quiz['numOfquest'].'">'.$quiz['numOfquest'].'</option>
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
			    </td>';
			echo '</tr>';
			
			

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
        <script type="text/javascript" src="./js/quiz.js"></script>
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


