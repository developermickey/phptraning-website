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
function validateSchool(pageform){
	document.getElementById('validation_div').innerHTML='';
	if(pageform.school_name.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter School name!';
		pageform.school_name.focus();
		pageform.school_name.style.borderColor='red';
		return false;
	}else{
		pageform.school_name.style.borderColor='';
	}
	if(pageform.school_url.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter URL!';
		pageform.school_url.focus();
		pageform.school_url.style.borderColor='red';
		return false;
	}else{
		pageform.school_url.style.borderColor='';
	}
			
}