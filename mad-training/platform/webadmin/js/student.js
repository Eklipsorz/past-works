



$("#admin_stuTab  .editbtn").click(function(){
	
	stuid = this.id;
	stu_name = stuid.concat("_name");	
	stu_parent = stuid.concat("_parent");	
	stu_school = stuid.concat("_school");	
	stu_sex = stuid.concat("_sex");	
	stu_birthday = stuid.concat("_birthday");	
	stu_addr = stuid.concat("_addr");	
	stu_phone = stuid.concat("_phone");	
	stu_email = stuid.concat("_email");	
	stu_done = stuid.concat("_done");
	
	document.getElementById(stu_name).disabled = false;
	document.getElementById(stu_parent).disabled = false;
	document.getElementById(stu_school).disabled = false;
	document.getElementById(stu_sex).disabled = false;
	document.getElementById(stu_birthday).disabled = false;
	document.getElementById(stu_addr).disabled = false;
	document.getElementById(stu_phone).disabled = false;
	document.getElementById(stu_email).disabled = false;

	x = document.getElementsByClassName(stuid);
	for (var i = 0 ; i<x.length ; i++)
		x[i].style.border = "2px solid #00c0ff";
	document.getElementById(stuid).disabled = true;
	document.getElementById(stu_done).disabled = false;
});

$("#admin_stuTab .donebtn").click(function(){

	res = (this.id).split("_",2);
	stuid = res[0];
	stu_name = stuid.concat("_name");	
	stu_parent = stuid.concat("_parent");	
	stu_school = stuid.concat("_school");	
	stu_sex = stuid.concat("_sex");	
	stu_birthday = stuid.concat("_birthday");	
	stu_addr = stuid.concat("_addr");	
	stu_phone = stuid.concat("_phone");	
	stu_email = stuid.concat("_email");	
	stu_done = stuid.concat("_done");
	
	document.getElementById(stu_name).disabled = true;
	document.getElementById(stu_parent).disabled = true;
	document.getElementById(stu_school).disabled = true;
	document.getElementById(stu_sex).disabled = true;
	document.getElementById(stu_birthday).disabled = true;
	document.getElementById(stu_addr).disabled = true;
	document.getElementById(stu_phone).disabled = true;
	document.getElementById(stu_email).disabled = true;
	
	document.getElementById(stuid).disabled = false;
	document.getElementById(stu_done).disabled = true;

	stu_name_value = document.getElementById(stu_name).value;
	stu_parent_value = document.getElementById(stu_parent).value;
	stu_school_value = document.getElementById(stu_school).value;
	stu_sex_value = document.getElementById(stu_sex).value;
	stu_birthday_value = document.getElementById(stu_birthday).value;
	stu_addr_value = document.getElementById(stu_addr).value;
	stu_phone_value = document.getElementById(stu_phone).value;
	stu_email_value = document.getElementById(stu_email).value;
	
	x = document.getElementsByClassName(stuid);
	for (var i = 0 ; i<x.length ; i++)
		x[i].style.border = "none";

	$.get("member_update.php", {"id_value":stuid,"name_value":stu_name_value, "parent_value":stu_parent_value,
	"school_value":stu_school_value, "sex_value":stu_sex_value, "birthday_value":stu_birthday_value,
	"addr_value":stu_addr_value, "phone_value":stu_phone_value, "email_value":stu_email_value}, 
	function(results){
			if (results['isdone'] == "1")
				alert('學生' + stu_name_value + '的資料已更新');
	},"json");	
});



$("#admin_stuTab .deletebtn").click(function(){
	
	res = (this.id).split("_",2);
	stuid = res[0];

	stu_name = stuid.concat("_name");	
	stu_name_value = document.getElementById(stu_name).value;

	$.get("member_delete.php", {"id_value":stuid}, function(results){
	
			if (results['isdone'] == "1")
				alert('學生' + stu_name_value + '的資料已刪除');
			location.reload();
	},"json");
});


$("#admin_stuTab .resetpwdbtn").click(function(){
	
	res = (this.id).split("_",2);
	stuid = res[0];

	stu_name = stuid.concat("_name");	
	stu_name_value = document.getElementById(stu_name).value;


	$.get("member_resetpwd.php",{"id_value":stuid},function(results){
			
			if (results['isdone'] == "1")
				alert('學生' + stu_name_value + '的密碼已重設為預設密碼');

	},"json");


});

$("#admin_stuTab .addstubtn").click(function(){

	window.open("addstu.php",'window','toolbar=no, menubar=no, location=no, resizable=no, height=800, width=900');
});

