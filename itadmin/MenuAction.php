<?php
//MenuAction.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Admin.cls.php");
require_once("../includes/classes/Pages.cls.php");
require_once("../includes/classes/Menus.cls.php");

loginValidate();
$db = new SiteData();
$adminObj = new Admin();
$pageObj = new Pages();
$menuObj = new Menus();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "menu-management.php";
switch($act) {
	case "addmenu": {
		$menuObj->addMenu($_REQUEST);
		//$location = $location."?pid=".$_REQUEST['menu_pid'];
		$location = $_SERVER['HTTP_REFERER'];
	}break;
		
	case "updmenu": {
		$menuObj->updateMenu($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	
	case "del": {
		$menu_id = (int)$_REQUEST['mid'];
		$menu_pid = $menuObj->getParentMenuID($menu_id);
		$menuObj->deleteMenu($menu_id);
		$location = $location."?pid=".$menu_pid;
	}break;
	
	default : break;
}
redirect ($location);
?>