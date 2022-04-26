<?php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Admin.cls.php");
$db = new SiteData();
$adminObj = new Admin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=PAGE_TITLE?> :: ADMIN PANEL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="styles/admin.css" />
<script type='text/javascript' src='<?=ADMIN_HOME?>js/jquery.js'></script>
<script type='text/javascript' src='<?=ADMIN_HOME?>js/common.js'></script>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color:#CC3333;
}
body {background:url(images/l-bg.jpg) repeat;}
.login {width:296px;height:258px;margin: auto; background:url(images/loginbg.png) center no-repeat;text-align:left;}
.label {color: #373505;font-size:12px;font-weight:bold;line-height:20px;}
.headear {color: #373505;font-size:25px;font-weight:500;}
.tb {width:240px;height: 26px;line-height:22px;border: solid 1px #0066FF;background:#FFFFFF;}
-->
</style>
</head>
<body onLoad="document.frm.uname.focus();">
<?php getMessage();?>

<div class="bodydiv">
<table width="100%" border="1" bordercolor="#999999" cellpadding="0" cellspacing="0" class="bodytable">
  <tr>
    <td colspan="2" valign="middle"><?php require_once("includes/header.php"); ?></td>
  </tr>
  <tr>    
    <td align="left" valign="middle">
	<div class="maincontent" align="center">
    	<form name="frm" action="LoginAction.php" method="post">
<input type="hidden" name="act" value="login"><div style="height:50px;">&nbsp;</div>
<div align="center">
<div class="login">
	<div style="padding:20px;">		
		<div class="headear">Administrator Login</div>		
		<div style="width:250px;margin:15px auto;">
			<div class="label">Username</div>
			<div><input name="uname" type="text" class="tb" /></div><div>&nbsp;</div>
			<div class="label">Password</div>
			<div><input name="pass" type="password" class="tb" /></div><div>&nbsp;</div>
			<div align="right"><input type="submit" name="submit" value="Login" class="button" /> &nbsp;</div>
		</div>
	</div>
</div>
</div>
</form>
<p>&nbsp;</p>
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