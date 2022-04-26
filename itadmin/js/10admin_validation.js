// JavaScript Document
//admin_validation.js
function addadmin_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.name.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Name!';
	frm.name.focus();
	frm.name.style.borderColor='red';
	return false;
	}else{
	frm.name.style.borderColor='';
	}
	if(frm.uname.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter UserName!';
	frm.uname.focus();
	frm.uname.style.borderColor='red';
	return false;
	}else{
	frm.uname.style.borderColor='';
	}
	if(frm.pass.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Password!';
	frm.pass.focus();
	frm.pass.style.borderColor='red';
	return false;
	}else{
	frm.pass.style.borderColor='';
	}
	if(frm.repass.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Reenter Password!';
	frm.repass.focus();
	frm.repass.style.borderColor='red';
	return false;
	}else{
	frm.repass.style.borderColor='';
	}
	if(frm.repass.value!=frm.pass.value){
	document.getElementById('validation_div').innerHTML='Password Mismatch!';
	frm.repass.focus();
	frm.repass.style.borderColor='red';
	return false;
	}else{
	frm.repass.style.borderColor='';
	}
	
	if(!EmailValid(frm.email.value)) {
		frm.email.focus();
		frm.email.style.borderColor='red';
		return false;
	}
	else{
	frm.email.style.borderColor='';
	}
	if(frm.phone.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Phone No.!';
	frm.phone.focus();
	frm.phone.style.borderColor='red';
	return false;
	}else{
	frm.phone.style.borderColor='';
	}
	if(isNaN(frm.phone.value)){
	document.getElementById('validation_div').innerHTML='Please Enter Number Only';
	frm.phone.focus();
	frm.phone.style.borderColor='red';
	return false;
	}else{
	frm.phone.style.borderColor='';
	}	
}
function editadmin_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.name.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Name!';
	frm.name.focus();
	frm.name.style.borderColor='red';
	return false;
	}else{
	frm.name.style.borderColor='';
	}
	if(frm.uname.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter UserName!';
	frm.uname.focus();
	frm.uname.style.borderColor='red';
	return false;
	}else{
	frm.uname.style.borderColor='';
	}		
	if(!EmailValid(frm.email.value)) {
		frm.email.focus();
		frm.email.style.borderColor='red';
		return false;
	}
	else{
	frm.email.style.borderColor='';
	}
	if(frm.phone.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Phone No.!';
	frm.phone.focus();
	frm.phone.style.borderColor='red';
	return false;
	}else{
	frm.phone.style.borderColor='';
	}
	if(isNaN(frm.phone.value)){
	document.getElementById('validation_div').innerHTML='Please Enter Number Only';
	frm.phone.focus();
	frm.phone.style.borderColor='red';
	return false;
	}else{
	frm.phone.style.borderColor='';
	}	
}
function changepass_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';	
	if(frm.npass.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter New Password!';
		frm.npass.focus();
		frm.npass.style.borderColor='red';
		return false;
	}else{
		frm.npass.style.borderColor='';
	}
	if(frm.cpass.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter Confirm Password!';
		frm.cpass.focus();
		frm.cpass.style.borderColor='red';
		return false;
	}else{
		frm.cpass.style.borderColor='';
	}
	if(frm.cpass.value!=frm.npass.value){
		document.getElementById('validation_div').innerHTML='Password Mismatch!';
		frm.cpass.focus();
		frm.cpass.style.borderColor='red';
		return false;
	}else{
		frm.cpass.style.borderColor='';
	}
}