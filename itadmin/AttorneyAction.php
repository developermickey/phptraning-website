<?php
//StaffAction.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Admin.cls.php");
require_once("../includes/classes/Services.cls.php");

loginValidate();
$db = new SiteData();
$adminObj = new Admin();
$fObj = new Faculties();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$location = "manage_Attorney.php";
switch($act) {
	case "addfaculty": {
		$respond = $fObj->addFaculty($_REQUEST);
		$_SESSION[SES]['fdata'] = $_REQUEST;
		redirect ($location."?q=add");
	}break;
	
	case "editfaculty": {
		$respond = $fObj->editFaculty($_REQUEST);
		redirect ($location."?q=edit&id=".$_REQUEST['faculty_id']);
	}break;
	
	case "del": {
		$respond = $fObj->deleteFaculty($_REQUEST['id']);
		redirect ($location);
	}break;
	case "sort": {				
		if(isset($_REQUEST['sortorder'])) {			
			foreach($_REQUEST['sortorder'] as $k=>$v) {
				$x = substr($k,1,strlen($k));
				$id = (int)$x;
				$sql = "UPDATE ".ATTORNEY." set sort_order='$v' where 	id='$id'";					
				$fObj->update($sql);
			}
			setMessage("Attorney are Re-ordered", "correct");				
		}redirect ($location);
	}break;
	default :redirect ($location); break;
}
?>