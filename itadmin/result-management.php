<?php
//page-management.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Admin.cls.php");
require_once("../includes/classes/Pages.cls.php");

loginValidate();
$db = new SiteData();
$adminObj = new Admin();
$pageObj = new Pages();
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
<script type='text/javascript' src='js/pages.js'></script>


<!--Date picker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!---->


<script type="text/javascript">
function sortdata(orderby) {
	document.location.href="PageSort.php?orderby="+orderby;
} 
</script>

<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      yearRange: "1970:2050",
      dateFormat: 'dd-M-yy',
      changeMonth: true,
      changeYear: true
    });
  });
  </script>
  
  
  <script>
  	function sum(){
       var txtFirstNumberValue = document.getElementById('txt1').value;
       var txtSecondNumberValue = document.getElementById('txt2').value;
	   var txtThirdNumberValue = document.getElementById('txt3').value;
	   var txtFourthNumberValue = document.getElementById('txt4').value;
	   var txtFifthNumberValue = document.getElementById('txt5').value;
	   var txtSixthNumberValue = document.getElementById('txt6').value;
	   var txtSeventhNumberValue = document.getElementById('txt7').value;
       if (txtFirstNumberValue == "")
           txtFirstNumberValue = 0;
       if (txtSecondNumberValue == "")
           txtSecondNumberValue = 0;
	   if (txtThirdNumberValue == "")
           txtThirdNumberValue = 0;
	   if (txtFourthNumberValue == "")
           txtFourthNumberValue = 0;
	   if (txtFifthNumberValue == "")
           txtFifthNumberValue = 0;
	   if (txtSixthNumberValue == "")
           txtSixthNumberValue = 0;
	   if (txtSeventhNumberValue == "")
           txtSeventhNumberValue = 0;	   	      

       var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue) + parseInt(txtFourthNumberValue) + parseInt(txtFifthNumberValue) + parseInt(txtSixthNumberValue) + parseInt(txtSeventhNumberValue);
       if (!isNaN(result)) {
           document.getElementById('txt8').value = result;
       }
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
      <td align="center" valign="top" width="150"><?php require_once("includes/column_left.php"); ?>
      </td>
      <td align="left" valign="top"><div class="maincontent">
          <?php
		$q= isset($_GET['q'])?$_GET['q']:"";
		switch($q) {
			case "add" :include_once("includes/result_add.php"); break;
			case "edit" :include_once("includes/result_edit.php"); break;
			default:  include_once("includes/result-list.php"); break;
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
