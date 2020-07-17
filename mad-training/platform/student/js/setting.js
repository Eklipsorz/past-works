




/*
$("#begin_practice_btn").click(function(){
	

	digit = document.getElementById('digit').value;
	numOfset = document.getElementById('numOfset').value;
	speed = document.getElementById('speed').value;
	maxOfquest = document.getElementById('maxOfquest').value;

	$.get("init_question.php",{"digit":digit, "numOfset":numOfset, "speed": speed, 
	"maxOfque": maxOfquest},function(results){	
		window.open("practice.php","_blank","toolbar=no, menubar=no, location=no, resizable=no,titlebar=no");
	});	

});
*/

$("#begin_practice_btn").click(function(){
	

	digit = document.getElementById('digit').value;
	numOfset = document.getElementById('numOfset').value;
	speed = document.getElementById('speed').value;
	maxOfquest = document.getElementById('maxOfquest').value;

	$.get("init_question.php",{"digit":digit, "numOfset":numOfset, "speed": speed, 
	"maxOfque": maxOfquest},function(results){	
		window.open("quiz.php","_blank","toolbar=no, menubar=no, location=no, resizable=no,titlebar=no");
	});	

});




$("#begin_quiz_btn").click(function(){


	temp = document.getElementById("quiz_stuid").value;
	res = (temp).split("_",2);
	stuid = res[0];

	$.get("checkQuiz.php",{"stu_id_value":stuid},function(results){

			if(results['isdone'] == "1")
			{
				window.location.href="quiz.php";
			}
			else if(results['isdone'] == "0")
				alert("今日沒有考試了，明天再試試吧");
		
	},"json");	


});
