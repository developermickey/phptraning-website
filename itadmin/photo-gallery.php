<?php
//admin-manager.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/PhotoGallerys.cls.php");
loginValidate();
$db = new SiteData();
$phoObj = new PhotoGallerys();
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
<link rel="stylesheet" type="text/css" href="styles/calendar.css" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/common.js'></script>
<script type='text/javascript' src='js/cal.js'></script>
<script type='text/javascript' src='js/validation.js'></script>
<script type="text/javascript">
function sortdata(orderby) {
	document.location.href="PhotoCategorySort.php?orderby="+orderby;
} 
</script>
<script type="text/javascript">
jQuery(document).ready(function () {
	$('input.two').simpleDatepicker({ startdate: 2002, enddate: 2013 });
});
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
    <td align="center" valign="top" width="150">
    <?php require_once("includes/column_left.php"); ?>
    </td>
    <td align="left" valign="top">
	<div class="maincontent">
    	<?php
		$q= isset($_GET['q'])?$_GET['q']:"";
		switch($q) {
			case "editphoto" : {include_once("includes/photogallery_edit.php"); break;}
			case "addphoto" : {include_once("includes/photogallery_add.php"); break;}
			case "photogallery" : {include_once("includes/photogallery_list.php"); break;}
			case "add" : {include_once("includes/category_add.php"); break;}
			case "edit" : {include_once("includes/category_edit.php"); break;}
			default:  {include_once("includes/category_list.php"); break;}
		}?>
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="middle"><?php require_once("includes/footer.php"); ?></td>
  </tr>
</table>
</div>
</body>
</html>
