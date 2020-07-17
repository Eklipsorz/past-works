<?php

	
	include("../mysqli_connect.php");
	
	$data = array();
	
	$classno = $_GET["classno"];
	$classname = urlencode(iconv("utf-8","big5",$_GET["classname"]));
	$clocation = $_GET["clocation"];
	
	if ($classno == "" || $classname == "" || $clocation == "")
		return;
	
	//$url="http://bsb.edu.tw/afterschool/register/showpage.jsp?pageno=0&p_road=&p_name=$classname&p_area=&p_type=a&di=&estab=&start_year=&start_month=&start_day=&end_year=&end_month=&end_day=&citylink=$clocation";
	$url="http://bsb.edu.tw/afterschool/register/print_showpage.jsp?pageno=1&p_road=&p_name=$classname&e_name=&p_area=&p_type=&di=&estab=&start_year=&start_month=&start_day=&end_year=&end_month=&end_day=&p_range=on&citylink=$clocation&pnt=2";
	$content = iconv("big5", "utf-8",file_get_contents($url));
	preg_match_all('#<td width="160" class="listBody">(.*)</td>#', $content, $match_clname);
	
	$i = 0;
	foreach ($match_clname[1] as $ht){
		$ht = preg_replace("/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/","",$ht);
		//$ht = stripslashes($ht);
		$data_claddr[$i] = $ht;
		
		$i = $i+1;
	}
	
	


	preg_match_all('#<td width="170" class="listBody">(.*)</td>#', $content, $match_clname);
	//$classname=$match[1];
	
	$i = 0;
	foreach ($match_clname[1] as $ht){
		$ht = preg_replace("/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/","",$ht);
		//$ht = stripslashes($ht);
		$data_clname[$i] = $ht;
		
		$i = $i+1;
	}
	
	preg_match_all('#<td width="50" class="listBody">(.*)</td>#', $content, $match_phone);
	//$phone=$match[1];		
	
	$i=0;
	foreach ($match_phone[1] as $ht){
		$ht = preg_replace("/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/","",$ht);
		$data_phone[$i] = $ht;
		$i = $i+1;
	}

	preg_match_all('/第(.*)號/', $content, $match_number);
	//$number=$match[1];
	
	

	
	$i=0;
	foreach ($match_number[1] as $ht){
		
		$ht = preg_replace("/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/","",$ht);
		
		$data_number[$i] = $ht;
		if ($data_number[$i] == $classno)
		{

			//echo $data_clname[$i];
			//echo " " . $data_phone[$i] . "";

			$classno = stripslashes($classno);

			/* prevent sql injection attacks */
			$classno = mysqli_real_escape_string($conn,$classno);	
			$sql = "select * from `class` where classno='$classno'";
			
			$result = $conn->query($sql);			
			//if ($result === FALSE )
			//	echo "Error: " . $sql . "<br>" . $conn->error;
			
			if ($result->num_rows > 0) {
				$isExist = 2;
			}
			else
				$isExist = 1;	
			
			$statusTab = array("name"=>$data_clname[$i],"addr"=>$data_claddr[$i],
			"phonenu"=>$data_phone[$i],"isExist"=>$isExist);
			
			echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);
			
			$conn->close();		
			return;	
		}
		$i=$i+1;
	}

	/* The class user assigns is not exist */	
	$statusTab = array("name"=>"","addr"=>"","phonenu"=>"","isExist"=>0);
	echo json_encode($statusTab,JSON_UNESCAPED_UNICODE);
	/*
	echo $data_number[$i];
	echo $data_clname[$i];
	echo $data_phone[$i];
	*/
#	$phone = $data[2];
	#preg_match('/府教社字第(.*)號/', $data[3], $match);

?>
