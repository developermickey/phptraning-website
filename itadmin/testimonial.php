<?php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Admin.cls.php");
require_once("../includes/classes/Faculties.cls.php");

loginValidate();
$db = new SiteData();
$adminObj = new Admin();
$fObj = new Faculties();
$_curpage = currentPage();
$_SESSION[SES]['curpage'] = currentURL();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?=PAGE_TITLE?> :: ADMIN PANEL</title>
<link rel="stylesheet" type="text/css" href="styles/admin.css" />
<link rel="stylesheet" type="text/css" href="styles/common.css" />
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/common.js'></script>
<script type='text/javascript' src='js/fac_validation.js'></script>

<script type="text/javascript">
function sortdata(orderby) {
	document.location.href="FacultySort.php?orderby="+orderby;
} 
</script>
<script type="text/javascript">
         
        function validate()
        {
			if(document.form1.cmbcategory.value=="")
            {
                alert("Please Select Product Category");
                document.form1.cmbcategory.focus();
                return false;	
            } 
			if(document.form1.cmbsubcat.value=="")
            {
                alert("Please Select Product Subcategory Name");
                document.form1.cmbsubcat.focus();
                return false;	
            } 
            if(document.form1.title.value=="")
            {
                alert("Please Enter Product Title");
                document.form1.title.focus();
                return false;	
            } 
			if(document.form1.model_name.value=="")
            {
                alert("Please Enter Model Name");
                document.form1.model_name.focus();
                return false;	
            } 
			if(document.form1.resolution.value=="")
            {
                alert("Please Enter Resolution");
                document.form1.resolution.focus();
                return false;	
            } 
			if(document.form1.T2.value == "" ){ 
                if(document.form1.image.value=="")
                {
                    alert("Please Upload  Image");
                    return false;	
                }
            }
            if(document.form1.image.value != "")
            {
                if(!/(\.gif|\.jpg|\.png|\.jpeg)$/i.test(document.form1.image.value)) 
                {
                    alert("please upload a valid image file\nPlease upload a image file with an extention of one of the following :\n\n GIF,JPEG,JPG");
                    return false;
                }
            }
			if(document.form1.T3.value==""){
           		if(document.form1.datasheet.value=="")
                {
                    alert("Please Upload  Data Sheet");
                    return false;	
                }
            } 
			if(document.form1.T4.value == "" ){ 
                if(document.form1.logo.value=="")
                {
                    alert("Please Upload  Logo");
                    return false;	
                }
            }
            if(document.form1.logo.value != "")
            {
                if(!/(\.gif|\.jpg|\.png|\.jpeg)$/i.test(document.form1.logo.value)) 
                {
                    alert("please upload a valid image file\nPlease upload a image file with an extention of one of the following :\n\n GIF,JPEG,JPG");
                    return false;
                }
            }
			if(document.form1.basic_specification.value=="")
            {
                alert("Please Enter Basic Specification");
                document.form1.basic_specification.focus();
                return false;	
            }  
        }
    </script>   
<script>
function citywiseVenue(val)
{
	xmlHttp=GetXmlHttpObject();
	var venue = document.getElementById('cmbEventVenue').value;
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}

	var url="manageeventschedule.php?cityname="+val+"&venuename="+venue;
		
	//alert(url);
	xmlHttp.onreadystatechange=Statepagination;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
</script>
</head>
<body>
<?php getMessage();?>
<div class="bodydiv">
  <table width="100%" border="1" bordercolor="#999999" cellpadding="0" cellspacing="0" class="bodytable">
    <tr>
      <td colspan="2" valign="middle"><?php require_once("includes/header.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top" width="170"><?php require_once("includes/column_left.php"); ?>
      </td>
      <td align="left" valign="top"><div class="maincontent">
          <?php
		$q= isset($_GET['q'])?$_GET['q']:"";
		switch($q) {
			case "add" :include_once("includes/testi.php"); break;
			case "edit" :include_once("includes/test_edit.php"); break;
			default:  include_once("includes/testi_list.php"); break;
		}?>
        </div></td>
    </tr>
    <tr>
      <td colspan="2" valign="middle"><?php require_once("includes/footer.php"); ?></td>
    </tr>
  </table>
</div>
</body>
</html>