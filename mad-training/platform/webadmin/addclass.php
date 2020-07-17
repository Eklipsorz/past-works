<?php
	include('add_class_into_sql.php');
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
</head>

<body>



<div class="logo"></div>
<div class="login-block">
    <h1>新增補習班資料</h1>

<form action="" method="post">
	<div style="text-align: center; color: red">
		<span style="font-size:28px;"><?php echo $error; ?></span>
	</div>
<div class="nino-followUs">
<div class="socialNetwork">
 <h3>
<div class="col-md-auto"><ul><li><i class="mdi mdi-account yu-icon"></i><span>帳號:</span> <input type="text" name="account"/></li></ul></div>
<div class="col-md-auto"><ul><li><i class="mdi mdi-key yu-icon"></i><span>密碼:</span> <input type="password" name="password"/></li></ul></div>
<div class="col-md-auto"> <i class="mdi mdi-map-marker-radius yu-icon"></i><span>補習班所在縣市:</span>
<select name="location">
	 <option value="24">基隆市</option>
  	 <option value="20">台北市</option>
  	 <option value="21">新北市</option>
 	 <option value="33">桃園市</option>
 	 <option value="35">新竹市</option>
 	 <option value="36">新竹縣</option>
 	 <option value="37">苗栗縣</option>
 	 <option value="42">臺中市</option>
 	 <option value="47">彰化縣</option>
 	 <option value="55">雲林縣</option>
 	 <option value="49">南投縣</option>
 	 <option value="52">嘉義市</option>
 	 <option value="53">嘉義縣</option>
 	 <option value="62">台南市</option>
 	 <option value="70">高雄市</option>
 	 <option value="87">屏東縣</option>
 	 <option value="39">宜蘭縣</option>
 	 <option value="38">花蓮縣</option>
 	 <option value="89">台東縣</option>
 	 <option value="69">澎湖縣</option>
 	 <option value="82">金門縣</option>
 	 <option value="83">連江縣</option>
</select> <p></div>
<div class="col-md-auto"><ul><li><i class="mdi mdi-account-card-details yu-icon"></i><span>補習班立案號:</span> <input type="text" name="classno" /></li></ul></div>
<div class="col-md-auto"><ul><li><i class="mdi mdi-account-card-details yu-icon"></i><span>補習班名稱:</span> <input type="text" name="clname" size="40" /></li></ul></div>
<div class="col-md-auto"><ul><li><i class="mdi mdi-map-marker yu-icon"></i><span>補習班地址:</span> <input type="text" name="addr" size="40"/><li></ul></div>
<div class="col-md-auto"><ul><li><i class="mdi mdi-phone yu-icon"></i><span>補習班電話:</span>  <input type="text" name="phone" size="40"/></li></ul>    </div>       
</h3>
                                        </div>

	
    <button id="addclass_submit" name="addclass_submit">送出</button>
</div>
</div>
</form>
</body>
</html>

