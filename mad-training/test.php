<?php
	#header ('Content-Type: text/html; charset=utf-8');	
	$string='鵝媽媽';
	echo $string;
	
	
	$string1=urlencode(iconv( "UTF-8", "Big5", $string ));
	$string2=urlencode($string);
	echo $string1;
	echo $string2;

?>
