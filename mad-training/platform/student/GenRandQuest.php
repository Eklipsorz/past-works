<?php

	function genQuestion()
	{
		session_start();
		$digit = $_SESSION['madsys_digit'];
		$numOfset = $_SESSION['madsys_numOfset'];	
		
		switch($digit)
		{
			case 2:
				$min = 10;
				$max = 99;
				break;
			case 3:
				$min = 100;
				$max = 999;
				break;
			case 4:
				$min = 1000;
				$max = 9999;
				break;
			case 5:
				$min = 10000;
				$max = 99999;
				break;
			case 6:
				$min = 100000;
				$max = 999999;
				break;
			case 7:
				$min = 1000000;
				$max = 9999999;
				break;
			case 8:
				$min = 10000000;
				$max = 99999999;
				break;
		}


		$question = array("");
		$sumOfSym = ($numOfset*2)-1;
		$symbol = -1;
		for ($i = 0; $i < $sumOfSym; $i++){
			if ($i%2 === 0)
			{	
				$temp = rand($min,$max);
				
				if ($symbol != -1)
				{
					if ($symbol%2 == 0)
						$ans = $ans + $temp;
					else
						$ans = $ans - $temp;				
				}
				else
					$ans = $temp;
			}
			else 
			{
				$symbol = rand(0,100);
				
				if ( $symbol%2 == 0)
					$temp = "+";
				else
					$temp = "-";	
			}

			array_push($question,$temp);
		}
		array_push($question,"=");	
		$question[0] = $ans;	
		return $question;

	}


	function num2Chinese($num){	
		
		session_start();
		$digit = $_SESSION['madsys_digit'];
	
		$num2Chine = "";
		$num_Of_splitSet = ceil($digit/4);
		
		$temp_string = array("");
		
		$enable_to_simplify = 0;		

		for ($i = 0; $i < $num_Of_splitSet; $i++)
		{		
			$temp = $num % 10000;
			
			if($i == $num_Of_splitSet - 1 && floor($num/10) == 1)
				$enable_to_simplify = 1;
			
			
			$num = $num / 10000;
		
			
			switch($i)
			{
				case 1:
					$unit2Chine = '万';
					break;
				case 2:
					$unit2Chine = '億';
					break;
				default:
					$unit2Chine = '';
					break;
			}		
				
				
			array_push($temp_string,(transfer($temp,$enable_to_simplify) . $unit2Chine));		
		}
		
		$toChine = "";
		for ($j = $i ; $j >= 1; $j--)
		{		
			$toChine = $toChine . $temp_string[$j];
		}
		
		return $toChine;	
	}

	function symbol2Chinese($str)
	{
		switch($str)
		{
			case "+":
				$toChine = " 加 ";
				break;
			case "-":
				$toChine = " 減 ";
				break;
			case "=":
				$toChine = " 等魚 ";
				break;
		}
		
		return $toChine;
	}

	function transfer($num,$enable_to_simplify)
	{

		$splitDigit = 4;
		
		$toChine = "";
		
		for($i = $splitDigit -1 ; $i >= 0; $i--)
		{
			$temp = floor($num / (pow(10,$i)));
			$num = $num % (pow(10,$i));
			$num2Chine = "";			
			$unit2Chine = "";
			
			switch($temp)
			{
				case 1:
					if($enable_to_simplify)
					{
						$enable_to_simplify = 0;
						break;
					}
					$num2Chine = '一';
					break;
				case 2:
					$num2Chine = '二';
					break;
				case 3:
					$num2Chine = '叁';
					break;
				case 4:
					$num2Chine = '四';
					break;
				case 5:
					$num2Chine = '五';
					break;
				case 6:
					$num2Chine = '六';
					break;
				case 7:
					$num2Chine = '七';
					break;
				case 8:
					$num2Chine = '八';
					break;
				case 9:
					$num2Chine = '九';
					break;				
			}

			if ($temp > 0)
			{
				switch($i)
				{
					case 1:
						$unit2Chine = '十';
						break;
					case 2:
						$unit2Chine = '百';
						break;
					case 3:
						$unit2Chine = '千';	
						break;
				}



			}
			
			$toChine = $toChine . $num2Chine . $unit2Chine;
		}
		return $toChine;
	}


	function GenQuetinChinese($question)
	{
		$i = 0;
		
		$_SESSION['current_question'] = $question;

		$toVoice = "";
		for( $i = 1; $i < count($question); $i++)
		{
			if ($i%2 == 1)
				$temp = num2Chinese($question[$i]); 
			else
				$temp = symbol2Chinese($question[$i]);
			$toVoice = $toVoice . $temp; 
		}
		//echo $toVoice;		
		
		session_start();
		$_SESSION['madsys_ans'] = $question[0];	
		
		return $toVoice;

	}
 
?>
