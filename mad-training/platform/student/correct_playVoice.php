<?php

	include('./GenRandQuest.php');	
	session_start();
	
	$maxOfQuest = $_SESSION['numOfincorrect'] + 1;
	$digit =  $_SESSION['madsys_digit'];
	$numOfset = $_SESSION['madsys_numOfset'];
	$speed = $_SESSION['madsys_speed'];
	
/********** generate some questions ***********/
	if ($_SESSION['isFirst'] === 1){
	
		$question = $_SESSION['incorrect_question'][0];
		array_splice($_SESSION['incorrect_question'],0,1);

		$toVoice = GenQuetinChinese($question);

		echo '<audio autoplay="autoplay">';

			
			echo '<source src="http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&spd='. $speed .'&
			text=第壹題   ' . $toVoice . '" type="audio/mpeg">';

			echo '<embed height="0" width="0" src="http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&
			spd=' . $speed . '&text=' . $toVoice . '">';

		echo '</audio>';

		$_SESSION['isFirst'] = 0;
		$_SESSION['countOfjoinQuiz'] = $_SESSION['countOfjoinQuiz'] - 1;
	}

/*******/	
	if(isset($_POST['madsys_submit'])) {
		if (empty($_POST['answer'])) {
			
			$error = "您尚未填寫完答案，請作答";
		
		}
		else
		{
			if($_POST['answer'] == $_SESSION['madsys_ans'])
			{
				
				$_SESSION['num_of_correctQuest'] = $_SESSION['num_of_correctQuest'] + 1;
				echo '<script type="text/javascript">alert("正確答案");</script>';
			}
			else if ($_POST['answer'] != $_SESSION['madsys_ans'])
			{
				array_push($_SESSION['incorrect_question'],$_SESSION['current_question']);				
				echo '<script type="text/javascript">alert("錯誤");</script>';
			}
			
			$_SESSION['madsys_numOfquest'] = $_SESSION['madsys_numOfquest'] + 1;
			if($_SESSION['madsys_numOfquest'] == $maxOfQuest)
			{
				echo '<script type="text/javascript">window.location.href="correct_score.php";</script>';
				return;
			}
		
			$question = $_SESSION['incorrect_question'][0];
			array_splice($_SESSION['incorrect_question'],0,1);

			$toVoice = GenQuetinChinese($question);
			
			
			$Question = '第' . $_SESSION['madsys_numOfquest'] . '題' . $toVoice;
			
			echo '<audio autoplay="autoplay">';
	
			echo '<source src="http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&spd='. $speed .'&
			text=' . $Question . '" type="audio/mpeg">';

			echo '<embed height="0" width="0" src="http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&
			spd=' . $speed . '&text=' . $toVoice . '">';

			echo '</audio>';
		
		}
		
	}
	
	
?>
