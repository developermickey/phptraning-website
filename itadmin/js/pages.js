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
function page_valid(pageform){
	document.getElementById('validation_div').innerHTML='';
	if(pageform.page_name.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter page name!';
		pageform.page_name.focus();
		pageform.page_name.style.borderColor='red';
		return false;
	}else{
		pageform.page_name.style.borderColor='';
	}
	if(pageform.page_url.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter page file name!';
		pageform.page_url.focus();
		pageform.page_url.style.borderColor='red';
		return false;
	}else{
		pageform.page_url.style.borderColor='';
	}
	if(pageform.page_title.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter page title!';
		pageform.page_title.focus();
		pageform.page_title.style.borderColor='red';
		return false;
	}else{
		pageform.page_title.style.borderColor='';
	}			
}