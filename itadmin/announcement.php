<?php
//admin-manager.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Announcement.cls.php");
loginValidate();
$db = new SiteData();
$announcementObj = new Announcement();
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
	document.location.href="AnnouncementSort.php?orderby="+orderby;
} 
</script>
<script type="text/javascript">
jQuery(document).ready(function () {
	$('input.two').simpleDatepicker({ startdate: 2012, enddate: 2030 });
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
			case "add" : {include_once("includes/announcement_add.php"); break;}
			case "edit" : {include_once("includes/announcement_edit.php"); break;}
			default:  {include_once("includes/announcement_list.php"); break;}
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
