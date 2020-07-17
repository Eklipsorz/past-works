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
    	<link rel="stylesheet" type="text/css" href="./css/admin.css" />
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
    <h1 class="nino-sectionHeading">補習班</h1>

	
    <table id="classTab" border="3" bordercolor="blue" width="1200" align="center">
        <thead align="center">
            <tr bgcolor="#87CEFA">
                <td width="150"><h3>單位</h3></td>
		<td width="100"><h3>立案號</h3></td>
                <td  width="100"><h3>帳號</h3></td>
                <td  width="100"><h3>重設密碼</h3></td>
                <td><h3>地址</h3></td>
                <td  width="100"><h3>電話</h3></td>
 		<td  width="50"><h3>詳細</h3></td>
		<td  width="60"><h3>編輯</h3></td>
                <td  width="50"><h3>刪除</h3></td>
            </tr>
        </thead>
	<?php
		include("../../mysqli_connect.php");	
		
		$sql = "select * from `class`";
		$db_class_data = $conn->query($sql);	
		while($class = $db_class_data->fetch_assoc()){
		
			$classno = $class['classno'];	
			$sql = "select name from `account` where classno='$classno' and type='1'";
			$db_account_data = $conn->query($sql);
			$account = $db_account_data->fetch_assoc();
			
			$account_name = $account['name'];
			$sql = "select * from `member_data` where accunt_name='$account_name'";
			$db_member_data = $conn->query($sql);
			$memdata = $db_member_data->fetch_assoc();





			echo '<tr  align="center">';
			
			echo  '<td width="15%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="35" class="txtbox" value="" id="' 
			. $account['name'] . '_clname" disabled>'.$class['clname'].'</textarea></div></div></td>';			
			echo  '<td width="8%"> <div> <div class="editarea"> <textarea rows="2" 
			cols="12"  class="txtbox" value="" id="'.$account['name'].'_classno"  disabled>'
			.$class['classno'].'</textarea></div></div></td>';			
			
			echo  '<td width="10%"> <div> <div class="editarea"> 
			<textarea rows="2" cols="15" name="realname" class="txtbox" value="" id="' 
			. $account['name'] . '_accname" disabled>'.$account['name'].'</textarea></div></div></td>';			
			echo  '<td width="5%"> <div class="buttonarea"><button class="resetpwdbtn" 
			id="' . $account['name'] . '_resetpwd"> <i class="mdi mdi-lock"></i>
			</button></div></td>';			
            	
	
		//	echo '<td><button class="sbtn"><i class="mdi mdi-lock yu-icon"></i></button></td>';
			
			echo  '<td width="30%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="50" class="txtbox" value="" id="' 
			. $account['name'] . '_addr" disabled>'.$class['address'].'</textarea></div></div></td>';			
            		
			echo  '<td width="8%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" class="txtbox" value="" id="' 
			. $account['name'] . '_phone" disabled>'.$class['phone'].
			'</textarea></div></div></td>';			
			
		//	echo  '<td width="12%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
		//	<textarea rows="2" cols="20" class="txtbox" value="" id="' 
		//	. $account['name'] . '_email" disabled>'.$memdata['email'].'</textarea></div></div></td>';			
			
			echo  '<td width="5%"> <div class="buttonarea"><button class="detailbtn" 
			id="' . $account['name'] . '_detail"> <i class="mdi mdi-information yu-icon"></i>
			</button></div></td>';
			
			echo  '<td><div class="buttonarea"><button class="editbtn" id="'
			. $account['name'] .'"><i class="mdi mdi-pencil"></i></button>
			<button class="donebtn" id="' . $account['name'] . '_done" disabled>
			<i class="mdi mdi-check"></i></button></div></td>';
			
			echo  '<td width="5%"> <div class="buttonarea"><button class="deletebtn" 
			id="' . $account['name'] . '_delete"> <i class="mdi mdi-delete yu-icon"></i>
			</button></div></td>';
            		
			echo '</tr>';
		

		}
			echo '<tr><td colspan="9" align="center"><button id="abtn" class="addclassbtn">
			<i class="mdi mdi-account-plus"></i>新增</button>';
		
		$conn->close();

	?>


        <!--tr align="center">
            <td>元元補習班</td>
            <td>0123456789</td>
			<td>c03</td>
            <td><button class="sbtn"><i class="mdi mdi-lock yu-icon"></i></button></td>
			<td>台中市太平區中山路一段308號</td>
            <td>0973008015</td>
			<td>eadh9024@yahoo.com.tw</td>
            <td><button class="sbtn"><i class="mdi mdi-information yu-icon"></i></button></td>
            <td><button class="sbtn"><i class="mdi mdi-pencil yu-icon"></i></button><button class="sbtn"><i class="mdi mdi-check yu-icon"></i></button></td>
            <td><button class="sbtn"><i class="mdi mdi-delete yu-icon"></i></button></td>
        </tr-->
        

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
        <script type="text/javascript" src="./js/admin.js"></script>
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

