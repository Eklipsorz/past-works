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
            <script src="https://use.fontawesome.com/484df5253e.js"></script>
</head>

<body data-target="#nino-navbar" data-spy="scroll">

        <!-- Header
    ================================================== -->
        <!--header id="nino-header">
                <div id="nino-headerInner">
                        <nav id="nino-navbar" class="navbar navbar-default" role="navigation">
                                <div class="container">
                                        <div class="navbar-header"><a class="navbar-brand" href="../../index.html">MAD training</a></div>
                                        <div class="nino-menuItem pull-right">
                                                                <div class="collapse navbar-collapse pull-left" id="nino-navbar-collapse">
                                                        <ul class="nav navbar-nav">
<li><a href="./">首頁</a></li> 
<li><a href="cla_person.html" class="mdi mdi-account nino-icon fsr"></a></li>
                                                        </ul>
                                                </div>
                                        </div>
                                </div>
                        </nav>
                                        </div>
                        </header-->
    <!-- header
    ================================================== -->
        <!--   http://css3buttongenerator.com/   -->
    <h1 class="nino-sectionHeading">老師</h1>


    <table border="3" id="admin_teaTab" align="center">
        <thead align="center">
            <tr bgcolor="#87CEFA">
                <td width="80"><h3>姓名</h3></td>
                <td  width="80"><h3>帳號</h3></td>
                <td  width="100"><h3>重設密碼</h3></td>
 <td width="50"><h3>性別</h3></td>
 <td width="100"><h3>生日</h3></td>
 <td width="100"><h3>電話</h3></td>
 <td><h3>EMAIL</h3></td>
<td><h3>地址</h3></td>
 <td  width="60"><h3>編輯</h3></td>
                <td  width="50"><h3>刪除</h3></td>
            </tr>
        </thead>
        <?php
                include("../../mysqli_connect.php");

                session_start();
                $user_classno = $_SESSION['current_selected_class'];

                $sql = "select * from `account` where type='2' AND classno='$user_classno'";
                $db_account_data = $conn->query($sql);
                while($account = $db_account_data->fetch_assoc()){

                        $accname = $account['name'];
                        $sql = "select * from `member_data` where accunt_name='$accname'";
                        $db_member_data = $conn->query($sql);
                        $memdata = $db_member_data->fetch_assoc();

			echo  '<td width="8%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="11" name="realname" class="txtbox" value="" id="' 
			. $account['name'] . '_name" disabled>'.$memdata['name'].'</textarea></div></div></td>';			
			
			echo  '<td> <div class="editarea"> <textarea rows="2" cols="12" name="stuid" 
			class="txtbox" value="" id="' . $account['name'] . '_name" 
			disabled>'.$account['name'].'</textarea></div></td>';			
			
			echo  '<td width="10%"> <div class="buttonarea"><button class="resetpwdbtn" 
			id="' . $account['name'] . '_resetpwd"> <i class="mdi mdi-lock"></i>
			</button></div></td>';
			
			echo  '<td><div class="' . $account['name'] . '"><div class="editarea"> 
			<textarea rows="2" cols="3" name="sex" class="txtbox" value="" id="' 
			. $account['name'] . '_sex" disabled>'.$memdata['sex'].'</textarea></div></td>';			
			echo  '<td> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" name="birthday" class="txtbox" value="" id="' 
			. $account['name'] . '_birthday" disabled>'.$memdata['birthday'].'</textarea>
			</div></td>';			
			
			echo  '<td> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" name="phone" class="txtbox" value="" id="' 
			. $account['name'] . '_phone" disabled>'.$memdata['phone'].'</textarea>
			</div></td>';			
			
			echo  '<td width="16%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="27" name="email" class="txtbox" value="" id="' 
			. $account['name'] . '_email" disabled>'.$memdata['email'].'</textarea>
			</div></td>';
			
			echo  '<td> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="45" name="addr" class="txtbox" value="" id="' 
			. $account['name'] . '_addr" disabled>'. $memdata['addr'].'</textarea>
			</div></td>'; 
			
			echo  '<td><div class="buttonarea"><button class="editbtn" id="'
			. $account['name'] .'"><i class="mdi mdi-pencil"></i></button>
			<button class="donebtn" id="' . $account['name'] . '_done" disabled>
			<i class="mdi mdi-check"></i></button></div></td>';
			
			echo  '<td><div class="buttonarea"><button class="deletebtn" id="' 
			. $account['name'] . '_delete"><i class="mdi mdi-delete"></i>
			</button></div></td>';
			echo  '</tr>';
			
		} 	
		$conn->close();
		
	?>

	<tr><td colspan="10" align="center"><button id="abtn" class="addteabtn">
	<i class="mdi mdi-account-plus"></i>新增</button>
</td>
</tr>
    </table>
                        <br><br>
                        <h1 class="nino-sectionHeading">學生</h1>
    	<table border="3" id="admin_stuTab" align="center">
        <thead align="center">
            <tr bgcolor="#FFB6C1">
                <td width="80"><h3>姓名</h3></td>
                <td  width="80"><h3>帳號</h3></td>
                <td  width="100"><h3>重設密碼</h3></td>
<td width="50"><h3>性別</h3></td>
<td width="100"><h3>生日</h3></td>
<td width="80"><h3>家長</h3></td>
<td width="50"><h3>就讀</h3></td>
<td width="100"><h3>電話</h3></td>
<td><h3>EMAIL</h3></td>
<td><h3>地址</h3></td>
                <td  width="60"><h3>編輯</h3></td>
                <td  width="50"><h3>刪除</h3></td>
            </tr>
        </thead>
        <?php
                include("../../mysqli_connect.php");
                session_start();
                $user_classno = $_SESSION['current_selected_class'];

                $sql = "select * from `account` where type='3' AND classno='$user_classno'";
                $db_account_data = $conn->query($sql);
                while($account = $db_account_data->fetch_assoc()){

                        $accname = $account['name'];
                        $sql = "select * from `member_data` where accunt_name='$accname'";
                        $db_member_data = $conn->query($sql);
                        $memdata = $db_member_data->fetch_assoc();
			
			echo  '<td width="6%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="7" name="realname" class="txtbox" value="" id="' 
			. $account['name'] . '_name" disabled>'.$memdata['name'].'</textarea></div></div></td>';			
			
			echo  '<td width="6%"> <div class="editarea"> <textarea rows="2" cols="6" name="stuid" 
			class="txtbox" value="" id="' . $account['name'] . '_name" 
			disabled>'.$account['name'].'</textarea></div></td>';			
			
			echo  '<td width="10%"> <div class="buttonarea"><button class="resetpwdbtn" 
			id="' . $account['name'] . '_resetpwd"><i class="mdi mdi-lock"></i></button>
			</div></td>';
			
			echo  '<td width="4%"><div class="' . $account['name'] . '"><div class="editarea"> 
			<textarea rows="2" cols="3" name="sex" class="txtbox" value="" id="' 
			. $account['name'] . '_sex" disabled>'.$memdata['sex'].'</textarea></div></td>';			
			echo  '<td width="8%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="11" name="birthday" class="txtbox" value="" id="' 
			. $account['name'] . '_birthday" disabled>'.$memdata['birthday'].'</textarea>
			</div></td>';			
		
			echo  '<td width="6%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="7" name="parent" class="txtbox" value="" id="' 
			. $account['name'] . '_parent" disabled>'.$memdata['parent'].'</textarea>
			</div></div></td>';			
			echo  '<td width="6%"><div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="7" name="school" class="txtbox" value="" id="' 
			. $account['name'] . '_school" disabled>'.$memdata['school'].' </textarea></div></td>';			
			
			echo  '<td width="9%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="12" name="phone" class="txtbox" value="" id="' 
			. $account['name'] . '_phone" disabled>'.$memdata['phone'].'</textarea>
			</div></td>';			
			
			echo  '<td width="16%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="26" name="email" class="txtbox" value="" id="' 
			. $account['name'] . '_email" disabled>'.$memdata['email'].'</textarea>
			</div></td>';
			
			echo  '<td width="23%"> <div class="' . $account['name'] . '"> <div class="editarea"> 
			<textarea rows="2" cols="40" name="addr" class="txtbox" value="" id="' 
			. $account['name'] . '_addr" disabled>'. $memdata['addr'].'</textarea>
			</div></td>'; 
			
			echo  '<td><div class="buttonarea"><button class="editbtn" id="' . $account['name'] . '">
			<i class="mdi mdi-pencil"></i></button><button class="donebtn" 
			id="' . $account['name'] . '_done" disabled><i class="mdi mdi-check">
			</i></button></div></td>';
			
			echo  '<td width="4%"><div class="buttonarea"><button class="deletebtn" id="' 
			. $account['name'] . '_delete"> <i class="mdi mdi-delete"></i></button></div></td>';
                        echo  '</tr>';
                }
			echo '<tr><td colspan="12" align="center"><button id="abtn" class="addstubtn">
			<i class="mdi mdi-account-plus"></i>新增</button>';
                $conn->close();
        ?>

        </tr>


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
	<script type="text/javascript" src="./js/student.js"></script>
	<script type="text/javascript" src="./js/teacher.js"></script>


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


