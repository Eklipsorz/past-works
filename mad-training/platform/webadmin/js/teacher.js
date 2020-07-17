
$("#admin_teaTab  .editbtn").click(function(){
	
	teaid = this.id;
	
	tea_name = teaid.concat("_name");	
	tea_sex = teaid.concat("_sex");	
	tea_birthday = teaid.concat("_birthday");	
	tea_addr = teaid.concat("_addr");	
	tea_phone = teaid.concat("_phone");	
	tea_email = teaid.concat("_email");	
	tea_done = teaid.concat("_done");
	

	document.getElementById(tea_name).disabled = false;
	document.getElementById(tea_sex).disabled = false;
	document.getElementById(tea_birthday).disabled = false;
	document.getElementById(tea_addr).disabled = false;
	document.getElementById(tea_phone).disabled = false;
	document.getElementById(tea_email).disabled = false;

	x = document.getElementsByClassName(teaid);
	for (var i = 0 ; i<x.length ; i++)
		x[i].style.border = "2px solid #00c0ff";
	document.getElementById(teaid).disabled = true;
	document.getElementById(tea_done).disabled = false;

});

$("#admin_teaTab .donebtn").click(function(){
	
	res = (this.id).split("_",2);
	teaid = res[0];
	tea_name = teaid.concat("_name");	
	tea_sex = teaid.concat("_sex");	
	tea_birthday = teaid.concat("_birthday");	
	tea_addr = teaid.concat("_addr");	
	tea_phone = teaid.concat("_phone");	
	tea_email = teaid.concat("_email");	
	tea_done = teaid.concat("_done");
	
	document.getElementById(tea_name).disabled = true;
	document.getElementById(tea_sex).disabled = true;
	document.getElementById(tea_birthday).disabled = true;
	document.getElementById(tea_addr).disabled = true;
	document.getElementById(tea_phone).disabled = true;
	document.getElementById(tea_email).disabled = true;
	
	document.getElementById(teaid).disabled = false;
	document.getElementById(tea_done).disabled = true;

	tea_name_value = document.getElementById(tea_name).value;
	tea_sex_value = document.getElementById(tea_sex).value;
	tea_birthday_value = document.getElementById(tea_birthday).value;
	tea_addr_value = document.getElementById(tea_addr).value;
	tea_phone_value = document.getElementById(tea_phone).value;
	tea_email_value = document.getElementById(tea_email).value;
	
	x = document.getElementsByClassName(teaid);
	for (var i = 0 ; i<x.length ; i++)
		x[i].style.border = "none";

	$.get("member_update.php", {"id_value":teaid,"name_value":tea_name_value, "parent_value":"",
	"school_value":"", "sex_value":tea_sex_value, "birthday_value":tea_birthday_value,
	"addr_value":tea_addr_value, "phone_value":tea_phone_value, "email_value":tea_email_value}, 
	function(results){
			if (results['isdone'] == "1")
				alert('老師' + tea_name_value + '的資料已更新');
	},"json");	

});

$("#admin_teaTab .deletebtn").click(function(){
	
	res = (this.id).split("_",2);
	teaid = res[0];

	tea_name = teaid.concat("_name");	
	tea_name_value = document.getElementById(tea_name).value;

	$.get("member_delete.php", {"id_value":teaid}, function(results){
	
			if (results['isdone'] == "1")
				alert('老師' + tea_name_value + '的資料已刪除');
			location.reload();
	},"json");
});


$("#admin_teaTab .resetpwdbtn").click(function(){
	
	res = (this.id).split("_",2);
	teaid = res[0];

	tea_name = teaid.concat("_name");	
	tea_name_value = document.getElementById(tea_name).value;
	

	$.get("member_resetpwd.php",{"id_value":teaid},function(results){
			
			if (results['isdone'] == "1")
				alert('老師' + tea_name_value + '的密碼已重設為預設密碼');

	},"json");


});

$("#admin_teaTab .addteabtn").click(function(){

	window.open("addtea.php",'window','toolbar=no, menubar=no, location=no, resizable=no,height=800 width=900');
});
