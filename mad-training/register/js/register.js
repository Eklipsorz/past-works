
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var enable_next;
	
$(".next").click(function(){

	
	if(animating) return false;
	animating = true;
		
	
	if(current_fs === undefined || enable_next == 1)	
	{
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
	}
	//activate next step on progressbar using the index of next_fs
	enable_next = 0;
	if($("fieldset").index(current_fs) == 0)
	{	
		classno = document.getElementById("classno").value;
		classname = document.getElementById("classname").value;
		class_location = document.getElementById("location-select").value;
		
		if(classno.length == 0 || classname.length == 0 || class_location.length == 0)
		{	
			alert("您尚未輸入完資料，請輸入完再按下一步。");
			animating = false;
		}
		else{	

			/*datapost = {"var":"foo"};
			$.ajax({
				url:"test.php",
				type:"POST",
				data: {'test': JSON.stringify(datapost)},
				//dataType:"json",
				success: function(data){				
					console.log(data);
					//alert("學優文教有限公司附設臺中市私立明光東山文理短期補習班");
				},
				error: function(data){
					alert("fuck tou hi");
				}

			});*/	
			$.get("./checkValid.php", {"classno":classno,"classname":classname,
			"clocation":class_location}, function(results){
//				alert(results);
			//	res = results.split(' ',4);
		/*		alert(results);
				alert(results["name"]);
				alert(results["phonenu"]);
				alert(results["isExist"]);
		*/				
				if (results["isExist"] == "1") 
				{
					document.getElementById("real_clname").value = results["name"];
					document.getElementById("phonenumber").value = results["phonenu"];	
					document.getElementById("address").value = results["addr"];	
					callback_test(results);
					enable_next = 1;
				}
				else if (results["isExist"] == "2")
				{	
					alert("您的補習班早已經被註冊，請確認");
					animating = false;	
				}
				else
				{
					alert("您輸入的資料有誤，請麻煩重新輸入。");
					animating = false;	
				}
			},"json");
		}
	}
	else if ($("fieldset").index(current_fs) == 1)
	{
		
		//code = document.getElementById("code").value;
		
		//if (code.length > 0)
		//{
			callback_test(123);
			enable_next = 1;
		//}
		//else
		//{
		//	alert("您尚未輸入驗證碼");	
		//	animating = false;
		//}
	}	
});


function callback_test(data){

	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
				'transform': 'scale('+scale+')',
  				'position': 'absolute'
			});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
				
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
			
	});
	//current_fs = next_fs;
};




$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});




$(".submit").click(function(){

	clname = document.getElementById("real_clname").value;
	classno = document.getElementById("classno").value;
	class_location = document.getElementById("location-select").value;
	class_phone = document.getElementById("phonenumber").value;
	class_addr = document.getElementById("address").value;

	cladmin_account = document.getElementById("cladmin_account").value;
	cladmin_password = document.getElementById("cladmin_password").value;
	cladmin_email = document.getElementById("cladmin_email").value;
	cladmin_name = document.getElementById("cladmin_name").value;
	cladmin_addr = document.getElementById("cladmin_addr").value;
	cladmin_phone = document.getElementById("cladmin_phone").value;
	

	
	$("#msform").submit(false);
	
	if (cladmin_account.length == 0 || cladmin_password.length == 0 || cladmin_email.length == 0 || cladmin_name.length == 0 || cladmin_addr.length == 0 || cladmin_phone.length == 0 )
	{
		
		alert("您尚未填寫完資料，請填寫完再按下送出");

	}
	else
	{
			$.get("./check_and_add.php", {"classno":classno,"real_clname":clname, 
			"location_select":class_location, "phonenumber":class_phone, "address":class_addr,
			"cladmin_account":cladmin_account,"cladmin_password":cladmin_password,
			"cladmin_email":cladmin_email, "cladmin_name":cladmin_name,"cladmin_addr":cladmin_addr,
			"cladmin_phone":cladmin_phone}, function(results){
			
				//	alert(results);
				//	res = results.replace(' ','');
					//alert(results);	
				//	alert(res);
				//	alert(results["isdone"]);				
					if (results["isdone"] == "0")
					{
						window.location = "./isdone.html";
					}
					else if (results["isdone"] == "2")
						alert("帳號名稱已被其他人使用，請取別的帳號名稱");
			},"json");
	}

})


