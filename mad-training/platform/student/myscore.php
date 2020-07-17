<?php 

	session_start();
	include('./session.php');
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link href="../../c3/c3.css" rel="stylesheet">
	<link href="./css/ScoreChart.css" rel="stylesheet">
</head>

<body>



<div class="logo"></div>
<div class="login-block">

	  <h1 class="nino-sectionHeading">近期成績</h1>
<table  border="3" bordercolor="red" align="center">
        <thead align="center">
            <tr bgcolor="#FFB6C1">
                <td width="100"><h3>考試日期</h3></td>
                <td  width="80"><h3>位數</h3></td>
                <td  width="80"><h3>口數</h3></td>
		<td  width="80"><h3>速度</h3></td>
		<td  width="80"><h3>題數</h3></td>
		<td  width="80"><h3>答對</h3></td>
		<td  width="80"><h3>答對率</h3></td>
		<td  width="80"><h3>通過</h3></td>
		<td  width="80"><h3>狀態</h3></td>				
            </tr>
        </thead>
	<?php
		include("../../mysqli_connect.php");	
		$accname = $_SESSION['login_user'];	
		
		$sql = "select name from `member_data` where accunt_name='$accname'";
		$db_name = $conn->query($sql);			
		$memdata = $db_name->fetch_assoc();
		$realname = $memdata['name'];	
		

		$sql = "select * from `quiz` where accname='$accname' and score!='' 
		order by quiz_id desc limit 10";
		$db_quiz = $conn->query($sql);
		
		$list = array();
		$list[0] = array("x");
		$list[1] = array($realname);


		while($quiz = $db_quiz->fetch_assoc()){
        		
			$rate = round($quiz['score']/$quiz['numOfquest'],2);
			$rate_in_display = $rate*100;
			
			array_push($list[0],$quiz['quiz_date']);
			array_push($list[1],$rate);

			$quiz_speed = $quiz['speed']/2;

			echo '<tr  align="center">';
            		echo '<td>'.$quiz['quiz_date'].'</td>';
			echo '<td>'.$quiz['digit'].'</td>';
		        echo '<td>'.$quiz['numOfset'].'</td>';
			echo '<td>'.$quiz_speed.' 倍速</td>';
                        echo '<td>'.$quiz['numOfquest'].'</td>';
			echo '<td>'.$quiz['score'].'</td>';
			echo '<td>'.$rate_in_display.'%</td>';
			
			if ($rate_in_display >= 60)
            			echo '<td>通過</td>';
        		else
            			echo '<td>未通過</td>';

			if ($quiz['hasCorrected'] > 0)
				echo '<td>'.$quiz['hasCorrected'].'題未訂正</td>';
			else if($quiz['hasCorrected'] == 0)
				echo '<td>已訂正</td>';
			echo '</tr>';
			
		}	
	
		$pos_lastEl = $db_quiz->num_rows;
		$pos_halfEl = floor($db_quiz->num_rows/2) + 1 ;
		$dateviewer = array($list[0][$pos_lastEl],$list[0][$pos_halfEl],$list[0][2]);	

		

		$conn->close();


	?>
       
    </table>		

	   
<br><h1 class="nino-sectionHeading">圖表</h1>
	  <!--div id='Graph' align="center"></div-->
<div id='chart' align="center"></div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
<script src="../../c3/c3.min.js"></script>

<?php
	
	echo '<script type="text/javascript">';
	echo '	var chart = c3.generate({';
	echo '		bindto: "#chart",';
	echo '		data: {		 ';
	echo '			x: "x",';
	echo '			columns: ';
	echo 				json_encode($list,JSON_UNESCAPED_UNICODE);	
	echo '		},	 ';
	echo '		axis: {  ';
	echo '			y: {';
	echo '				max: 0.99,';
	echo '				min: 0,';
	echo '				label: {';
        echo ' 					text: "答對率",';
        echo ' 					position: "outer-middle"';
        echo '				},';
	echo '				tick: {';
	echo '					format: d3.format("%")';
	echo '				}';
	echo '			},';
	echo '			x: {';
	echo '				type: "timeseries",';
	echo '				tick: {';
	echo '					values:' . json_encode($dateviewer,JSON_UNESCAPED_UNICODE);	
	echo '				}';
	echo '			}';
	echo '		}';
	echo '	});';
		
	echo '</script>';
?>

<table  align="center"><tr align="center"><td><a href="./">返回</a></tr></td></table>


</div>

</body>
</html>
