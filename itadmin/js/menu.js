// JavaScript Document
function setPageContentType(elm) {
	var pagetype =  elm.options[elm.selectedIndex].value;
	var container = '';
	if(pagetype=="static") {
		$("#container_txtarea").hide();
		$("#container_htmlarea").show();
	}
	else {
		$("#container_htmlarea").hide();
		$("#container_txtarea").show();
	}	
}
function menu_valid(){
	var frm=document.addmenufrm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.menu_name.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter menu name!';
		frm.menu_name.focus();
		frm.menu_name.style.borderColor='red';
		return false;
	}else{
		frm.menu_name.style.borderColor='';
	}
	if(frm.menu_position.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter menu position!';
		frm.menu_position.focus();
		frm.menu_position.style.borderColor='red';
		return false;
	}else{
		frm.menu_position.style.borderColor='';
	}
	if(isNaN(frm.menu_position.value)){
		document.getElementById('validation_div').innerHTML='Please Enter menu position Number type!';
		frm.menu_position.focus();
		frm.menu_position.style.borderColor='red';
		return false;
	}else{
		frm.menu_position.style.borderColor='';
	}			
}