<?php
//MenuAction.php
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

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "announcement.php";
switch($act) {
	case "addnew": {
		$announcementObj->addAnnouncement($_REQUEST);
		header("location:".$location);
	}break;
		
	case "updatenew": {
		$announcementObj->updateAnnouncement($_REQUEST);
		header("location:".$location);
	}break;
	
	case "del": {
		$id = (int)$_REQUEST['id'];
		$announcementObj->deleteAnnouncement($id);
		header("location:".$location);
	}break;
	case "disable":{		
		$respond = $announcementObj->disableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "enable":{		
		$respond = $announcementObj->enableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "sort_order": {				
			if(isset($_REQUEST['sortorder'])) {			
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$aid = (int)$x;
					$sql = "UPDATE ".ANNOUNCEMENT." set sort_order=$v where id=$aid";					
					$db->update($sql);
				}				
			}header("location:".$location);
	}break;
	default : break;
}
redirect ($location);
?>