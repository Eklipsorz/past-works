


$("#classTab .editbtn").click(function(){
	
	classid = this.id;
	
	class_name = classid.concat("_clname");	
	class_addr = classid.concat("_addr");	
	class_phone = classid.concat("_phone");	
	class_done = classid.concat("_done");
	
	document.getElementById(class_name).disabled = false;
	document.getElementById(class_addr).disabled = false;
	document.getElementById(class_phone).disabled = false;

	x = document.getElementsByClassName(classid);
	for (var i = 0 ; i<x.length ; i++)
		x[i].style.border = "2px solid #00c0ff";
	document.getElementById(classid).disabled = true;
	document.getElementById(class_done).disabled = false;

});

$("#classTab .donebtn").click(function(){
	
	res = (this.id).split("_",2);
	classid = res[0];

	class_classno = classid.concat("_classno");	
	class_clname = classid.concat("_clname");	
	class_addr = classid.concat("_addr");	
	class_phone = classid.concat("_phone");	
	class_done = classid.concat("_done");
	
	document.getElementById(class_clname).disabled = true;
	document.getElementById(class_addr).disabled = true;
	document.getElementById(class_phone).disabled = true;
	
	document.getElementById(classid).disabled = false;
	document.getElementById(class_done).disabled = true;

	class_clname_value = document.getElementById(class_clname).value;
	class_addr_value = document.getElementById(class_addr).value;
	class_phone_value = document.getElementById(class_phone).value;	
	class_classno_value = document.getElementById(class_classno).value;	

	x = document.getElementsByClassName(classid);
	for (var i = 0 ; i<x.length ; i++)
		x[i].style.border = "none";

	$.get("./update.php", {"id_value":class_classno_value,"clname_value":class_clname_value,
	"addr_value": class_addr_value,"phone_value": class_phone_value},
	function(results){

			if (results['isdone'] == "1")
				alert(class_clname_value + '的資料已更新');
	},"json");	

});

$("#classTab .resetpwdbtn").click(function(){
	
	res = (this.id).split("_",2);
	classid = res[0];
	

	class_clname = classid.concat("_clname");	
	class_clname_value = document.getElementById(class_clname).value;
	
	$.get("resetpwd.php",{"id_value":classid},function(results){
			
			if (results['isdone'] == "1")
				alert( class_clname_value + '的密碼已重設為預設密碼');

	},"json");

});

$("#classTab .deletebtn").click(function(){
	
	res = (this.id).split("_",2);
	classid = res[0];
	
	class_clname = classid.concat("_clname");	
	class_clname_value = document.getElementById(class_clname).value;

	class_classno = classid.concat("_classno");	
	class_classno_value = document.getElementById(class_classno).value;	
	
	$.get("delete.php", {"id_value":class_classno_value}, function(results){
			
			if (results['isdone'] == "1")
			{	
				alert( class_clname_value + '的資料已刪除');
				location.reload();
			}
	},"json");

});


$("#classTab .detailbtn").click(function(){
	

	res = (this.id).split("_",2);
	classid = res[0];
	
	class_classno = classid.concat("_classno");	
	class_classno_value = document.getElementById(class_classno).value;	


	$.get("init_info.php",{"selected_class":class_classno_value},function(results){	
	
		window.open("info.php","_blank","toolbar=no, menubar=no, location=no, resizable=no,titlebar=no");
	
	});

});

$("#classTab .addclassbtn").click(function(){

	window.open("addclass.php",'window','toolbar=no, menubar=no, location=no, resizable=no,height=800 width=900');
});
