// JavaScript Document
function validateResearchCenter(formid){
	document.getElementById('validation_div').innerHTML='';
	if(formid.rc_name.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter  name!';
		formid.rc_name.focus();
		formid.rc_name.style.borderColor='red';
		return false;
	}else{
		formid.rc_name.style.borderColor='';
	}
	if(formid.rc_url.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter URL!';
		formid.rc_url.focus();
		formid.rc_url.style.borderColor='red';
		return false;
	}else{
		formid.rc_url.style.borderColor='';
	}		
}