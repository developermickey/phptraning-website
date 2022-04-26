<?php
//MenuAction.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Notification.cls.php");

loginValidate();
$db = new SiteData();
$noticeObj = new Notification();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "notification.php";
switch($act) {
	case "addnotice": {
		$noticeObj->addNotice($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
		
	case "updatenotice": {
		$noticeObj->updateNotice($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	
	case "del": {
		$id = (int)$_REQUEST['id'];
		$noticeObj->deleteNotice($id);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "disable":{		
		$respond = $noticeObj->disableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "enable":{		
		$respond = $noticeObj->enableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "sort_order": {				
			if(isset($_REQUEST['sortorder'])) {			
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$aid = (int)$x;
					$sql = "UPDATE ".NOTIFICATION." set sort_order=$v where id=$aid";					
					$db->update($sql);
				}				
			}header("location:".$location);
	}break;
	
	default : break;
}
redirect ($location);
?>