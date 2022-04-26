function EmailValid(emailfield)	{
	var email = emailfield;
	
	if(email=="")	{
		document.getElementById('validation_div').innerHTML='Enter Email ID!';
		return false;
	}
	len = email.length;
	if((email.charAt(1)=='@')||(email.charAt(1)=='.'))		{
		//alert("Invalid Email Please try again!");
		document.getElementById('validation_div').innerHTML='Invalid Email Please try again!';
		return false;
	}
	if((email.charAt(len-2)=='@')||(email.charAt(len-1)=='.'))	{
		//alert("Invalid Email Please try again!");
		document.getElementById('validation_div').innerHTML='Invalid Email Please try again!';
		return false;
	}
	count=0;
	dotcount=0;
	for (i=0; i< email.length; i++)	{
		if(email.charAt(i)=='@')
		count++;
		if(email.charAt(i)=='.')
		dotcount++;
	}		
	if((count !=1)||(dotcount <1))	{
		//alert("Invalid Email Please try again!")
		document.getElementById('validation_div').innerHTML='Invalid Email Please try again!';
		return false
	}			  
	return true
}




////////////////////////////////////ADD school page///////////////////////////////////

function add_school_valid(){
	var frm=document.addschoolfrm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.page_name.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter school page name!';
	frm.page_name.focus();
	frm.page_name.style.borderColor='red';
	return false;
	}else{
	frm.page_name.style.borderColor='';
	}
	if(frm.page_file_name.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter school page file name!';
	frm.page_file_name.focus();
	frm.page_file_name.style.borderColor='red';
	return false;
	}else{
	frm.page_file_name.style.borderColor='';
	}
	if(frm.page_title.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter school page title!';
	frm.page_title.focus();
	frm.page_title.style.borderColor='red';
	return false;
	}else{
	frm.page_title.style.borderColor='';
	}
	if(frm.page_metakeywords.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter school page metakeywords!';
	frm.page_metakeywords.focus();
	frm.page_metakeywords.style.borderColor='red';
	return false;
	}else{
	frm.page_metakeywords.style.borderColor='';
	}
	if(frm.page_metadesc.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter school page metadesc!';
	frm.page_metadesc.focus();
	frm.page_metadesc.style.borderColor='red';
	return false;
	}else{
	frm.page_metadesc.style.borderColor='';
	}			
}


////////////////////////////////////ADD notice ///////////////////////////////////


////////////////////////////////////ADD menu///////////////////////////////////

function add_menu_valid(){
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
////////////////////////////////////ADD Page///////////////////////////////////



/////////////////////////Change password///////////////////////////////////////
function changepass_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	
	if(frm.opass.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Current Password!';
	frm.opass.focus();
	frm.opass.style.borderColor='red';
	return false;
	}else{
	frm.opass.style.borderColor='';
	}
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
}// JavaSc
///////////////////////////////edit Admin Validation////////////////////////////////////////////
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
}// JavaScript Document


/////////////////////////////add Admin Validation////////////////////////////////////////////
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
}// JavaScript Document

/////////////////////////////add Lab Validation////////////////////////////////////////////
function addlab_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.fname.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Name!';
	frm.fname.focus();
	frm.fname.style.borderColor='red';
	return false;
	}else{
	frm.fname.style.borderColor='';
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
	if(!EmailValid(frm.email.value)) {
		frm.email.focus();
		frm.email.style.borderColor='red';
		return false;
	}
	else{
	frm.email.style.borderColor='';
	}	
}// JavaScript Document


/////////////////////////////add staff Validation////////////////////////////////////////////
function addstaff_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.fname.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Name!';
	frm.fname.focus();
	frm.fname.style.borderColor='red';
	return false;
	}else{
	frm.fname.style.borderColor='';
	}
	if(frm.title.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Title.!';
	frm.title.focus();
	frm.title.style.borderColor='red';
	return false;
	}else{
	frm.title.style.borderColor='';
	}
	/*if(frm.phone.value.length==0){
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
	if(!EmailValid(frm.email.value)) {
		frm.email.focus();
		frm.email.style.borderColor='red';
		return false;
	}
	else{
	frm.email.style.borderColor='';
	}
	*/
}// JavaScript Document
/////////////////////////////Register Validation////////////////////////////////////////////
function register_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.fname.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Name!';
	frm.fname.focus();
	frm.fname.style.borderColor='red';
	return false;
	}else{
	frm.fname.style.borderColor='';
	}
	if(frm.title.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Title.!';
	frm.title.focus();
	frm.title.style.borderColor='red';
	return false;
	}else{
	frm.title.style.borderColor='';
	}
	if(frm.office.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Office.!';
	frm.office.focus();
	frm.office.style.borderColor='red';
	return false;
	}else{
	frm.office.style.borderColor='';
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
	if(!EmailValid(frm.email.value)) {
		frm.email.focus();
		frm.email.style.borderColor='red';
		return false;
	}
	else{
	frm.email.style.borderColor='';
	}	
}// JavaScript Document

/////////////////////////////adminstration Validation////////////////////////////////////////////
function administration_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.fname.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Name!';
	frm.fname.focus();
	frm.fname.style.borderColor='red';
	return false;
	}else{
	frm.fname.style.borderColor='';
	}
	if(frm.title.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Title.!';
	frm.title.focus();
	frm.title.style.borderColor='red';
	return false;
	}else{
	frm.title.style.borderColor='';
	}
	if(frm.office.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter Office.!';
	frm.office.focus();
	frm.office.style.borderColor='red';
	return false;
	}else{
	frm.office.style.borderColor='';
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
	if(!EmailValid(frm.email.value)) {
		frm.email.focus();
		frm.email.style.borderColor='red';
		return false;
	}
	else{
	frm.email.style.borderColor='';
	}
	if(frm.courses_taught.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter courses taught!';
	frm.courses_taught.focus();
	frm.courses_taught.style.borderColor='red';
	return false;
	}else{
	frm.courses_taught.style.borderColor='';
	}
	if(frm.list_scholar.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter list of scholar!';
	frm.list_scholar.focus();
	frm.list_scholar.style.borderColor='red';
	return false;
	}else{
	frm.list_scholar.style.borderColor='';
	}
	if(frm.research_intrst.value.length==0){
	document.getElementById('validation_div').innerHTML='Please Enter research interst!';
	frm.research_intrst.focus();
	frm.research_intrst.style.borderColor='red';
	return false;
	}else{
	frm.research_intrst.style.borderColor='';
	}
}// JavaScript Document



/////////////////////////////faculty management system Validation////////////////////////////////////////////
function faculty_valid(){
	var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	
	if(frm.faculty_salutation.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter Salutation.!';
		frm.faculty_salutation.focus();
		frm.faculty_salutation.style.borderColor='red';
		return false;
	}else{
		frm.faculty_salutation.style.borderColor='';
	}
	
	if(frm.faculty_name.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter Name.!';
		frm.faculty_name.focus();
		frm.faculty_name.style.borderColor='red';
		return false;
	}else{
		frm.faculty_name.style.borderColor='';
	}
	
	if(frm.faculty_url.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter URL.!';
		frm.faculty_url.focus();
		frm.faculty_url.style.borderColor='red';
		return false;
	}else{
		frm.faculty_url.style.borderColor='';
	}
	
	if(frm.faculty_title.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter Title.!';
		frm.faculty_title.focus();
		frm.faculty_title.style.borderColor='red';
		return false;
	}else{
		frm.faculty_title.style.borderColor='';
	}
	
	if(frm.faculty_school.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Select School.!';
		frm.faculty_school.focus();
		frm.faculty_school.style.borderColor='red';
		return false;
	}else{
		frm.faculty_school.style.borderColor='';
	}
	
	if(frm.faculty_phone.value.length==0){
		document.getElementById('validation_div').innerHTML='Please Enter Phone.!';
		frm.faculty_phone.focus();
		frm.faculty_phone.style.borderColor='red';
		return false;
	}else{
		frm.faculty_phone.style.borderColor='';
	}
	
	if(!EmailValid(frm.faculty_email.value)) {
		frm.faculty_email.focus();
		frm.faculty_email.style.borderColor='red';
		return false;
	}
	else{
		frm.faculty_email.style.borderColor='';
	}
	
}// JavaScript Document
//////////////////////////////FACULTY ACHIEVEMENT////////////////////////
function faculty_achievement_valid(){
var frm=document.frm;
	document.getElementById('validation_div').innerHTML='';
	if(frm.faculty_id.value.length==0){
		document.getElementById('validation_div').innerHTML='Select Faculty!';
		frm.faculty_id.focus();
		frm.faculty_id.style.borderColor='red';
		return false;
	}else{
		frm.faculty_id.style.borderColor='';
	}
	if(frm.faculty_achievement.value.length==0){
		document.getElementById('validation_div').innerHTML='Enter Achievement !';
		frm.faculty_achievement.focus();
		frm.faculty_achievement.style.borderColor='red';
		return false;
	}else{
		frm.faculty_achievement.style.borderColor='';
	}
}