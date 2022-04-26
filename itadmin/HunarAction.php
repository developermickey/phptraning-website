<?php
//HunarAction.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Hunar.cls.php");

loginValidate();
$db = new SiteData();
$hObj = new Hunar();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$location = "hunar-se-rozgar.php";
switch($act) {
	case "add": {
		$hObj->addData($_REQUEST);
	}break;
		
	case "update": {
		$hObj->updateData($_REQUEST);
	}break;
	
	case "del": {
		$id = $_REQUEST['id'];
		$hObj->deleteData($id);
	}break;
	case "disable":{		
		$respond = $hObj->disableStatus($_REQUEST['id']);
	}break;
	case "enable":{		
		$respond = $hObj->enableStatus($_REQUEST['id']);
	}break;
	case "sort_order": {				
			if(isset($_REQUEST['sortorder'])) {			
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$aid = (int)$x;
					$sql = "UPDATE ".NEWS." set sort_order=$v where id=$aid";					
					$db->update($sql);
				}				
			}
	}break;
	default : break;
}
redirect ($location);
?>