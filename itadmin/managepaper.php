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
<script>
    // WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>
<!--<script type="text/javascript">
         
        function validate()
        {
            if(document.form1.year.value=="")
            {
                alert("Please Enter Year");
                document.form1.year.focus();
                return false;	
            }
			if(document.form1.title.value=="")
            {
                alert("Please Enter Title");
                document.form1.title.focus();
                return false;	
            }
			if(document.form1.auther1.value=="")
            {
                alert("Please Enter 1st Auther");
                document.form1.auther1.focus();
                return false;	
            }
			if(document.form1.barea.value=="")
            {
                alert("Please Enter Broad Area");
                document.form1.barea.focus();
                return false;	
            }
			if(document.form1.keyword.value=="")
            {
                alert("Please Enter Keyword");
                document.form1.keyword.focus();
                return false;	
            }
			if(document.form1.desc.value=="")
            {
                alert("Please Enter Description");
                document.form1.desc.focus();
                return false;	
            }
           
            if(document.form1.T2.value == "" ){ 
                if(document.form1.file1.value=="")
                {
                    alert("Please Upload  File");
                    return false;	
                }
            }
            if(document.form1.file1.value != "")
            {
                if(!/(\.doc|\.pdf)$/i.test(document.form1.file1.value)) 
                {
                    alert("please upload a valid file\nPlease upload a file with an extention of one of the following :\n\n pdf,doc");
                    return false;
                }
            }
        }
    </script>-->   

</head>
<body>
<?php getMessage();?>
<div class="bodydiv">
  <table width="100%" border="1" bordercolor="#999999" cellpadding="0" cellspacing="0" class="bodytable">
    <tr>
      <td colspan="2" valign="middle"><?php require_once("includes/header.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top" width="185"><?php require_once("includes/column_left.php"); ?>
      </td>
      <td align="left" valign="top"><div class="maincontent">
          <?php
		$q= isset($_GET['q'])?$_GET['q']:"";
		switch($q) {
			case "add" :include_once("includes/paper_add.php"); break;
			case "edit" :include_once("includes/paper_edit.php"); break;
			default:  include_once("includes/paper_list.php"); break;
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