<?php
//MenuAction.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Events.cls.php");

loginValidate();
$db = new SiteData();
$eventsObj = new Events();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "events.php";
switch($act) {
	case "addnew": {
		$eventsObj->addEvents($_REQUEST);
		header("location:".$location);
	}break;
		
	case "updatenew": {
		$eventsObj->updateEvents($_REQUEST);
		header("location:".$location);
	}break;
	
	case "del": {
		$id = (int)$_REQUEST['id'];
		$eventsObj->deleteEvents($id);
		header("location:".$location);
	}break;
	case "disable":{		
		$respond = $eventsObj->disableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "enable":{		
		$respond = $eventsObj->enableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "sort_order": {				
			if(isset($_REQUEST['sortorder'])) {			
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$aid = (int)$x;
					$sql = "UPDATE ".EVENTS." set sort_order=$v where id=$aid";					
					$db->update($sql);
				}				
			}header("location:".$location);
	}break;
	default : break;
}
redirect ($location);
?>