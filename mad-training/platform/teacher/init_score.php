<?php


	if ( isset($_GET["stu_id_value"]) && $_GET["stu_id_value"]!="" )
		$id = $_GET["stu_id_value"];
	else
		return;

	session_start();
	$_SESSION['current_score_paper'] = $id;
?>
