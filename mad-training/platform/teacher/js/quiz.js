

$("#quizTab .quiz_selector").change(function(){

	res = (this.id).split("_",2);
	stuid = res[0];
	
	value = this.value;
	value_type = res[1];
	
	$.get("./update_quiz.php", {"stu_id_value":stuid,"update_value":value,"update_type":value_type},
	function(results){		
	});


});



$("#quizTab .quiz_chkbox").click(function(){
	
	res = (this.id).split("_",2);
	stuid = res[0];
	
	stu_digit = stuid.concat("_digit");	
	stu_numOfset = stuid.concat("_numOfset");	
	stu_speed = stuid.concat("_speed");
	stu_numOfquest = stuid.concat("_numOfquest");

	stu_digit_value = document.getElementById(stu_digit).value;
	stu_numOfset_value = document.getElementById(stu_numOfset).value;
	stu_speed_value = document.getElementById(stu_speed).value;
	stu_numOfquest_value = document.getElementById(stu_numOfquest).value;

	if(stu_digit_value == "" || stu_numOfset_value == "" || stu_speed_value == "" 
	|| stu_numOfquest_value == "")	{

		alert("請填選完畢，再來點選");	

	}
	else
	{
		if(this.checked)
			mode = 1;
		else
			mode = 0;

		$.get("./SendUpdateTo.php", {"stu_id_value":stuid,"transmode":mode},
		function(results){		

				if(results['isdone'] == "1")
					alert("考試已建立了");
				else if(results['isdone'] == "0")
					alert("考試已取消了");
				

		},"json");

	}

});
