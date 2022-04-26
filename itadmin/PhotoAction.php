<?php
//MenuAction.php
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

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "photo-gallery.php";
switch($act) {
	case "addphoto": {
		$phoObj->addPhoto($_REQUEST);
		$location = "photo-gallery.php?q=addphoto&id=".$_REQUEST['id'];
	}break;
	case "editphoto": {
		$phoObj->editPhoto($_REQUEST);
		$page = $_REQUEST['page'];
		$location= 'photo-gallery.php?q=photogallery&id='.$_REQUEST['id']."&page=".$_REQUEST['page'];
	}break;
	case "addcategory": {
		$phoObj->addCategory($_REQUEST);
		$location = "photo-gallery.php";
	}break;
		
	case "editcategory": {
		$phoObj->updateCategory($_REQUEST);
		$location = "photo-gallery.php";
	}break;
	
	case "del": {
		$id = (int)$_REQUEST['id'];
		$phoObj->deleteCategory($id);
		$location = "photo-gallery.php";
	}break;
	case "disable":{		
		$respond = $phoObj->disableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "enable":{		
		$respond = $phoObj->enableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "delphoto": {
		$id = (int)$_REQUEST['id'];
		$phoObj->deletePhoto($id);
		$location = "photo-gallery.php?q=photogallery&id=".$_REQUEST['cid'];;
	}break;
	case "disablephoto":{		
		$respond = $phoObj->disableStatusPhoto($_REQUEST['id']);
		$cid = ($_REQUEST['cid']);
		//$location = "photo-gallery.php";
		$location= 'photo-gallery.php?q=photogallery&id='.$_REQUEST['cid']."&page=".$_REQUEST['page'];
	}break;
	case "enablephoto":{		
		$respond = $phoObj->enableStatusPhoto($_REQUEST['id']);
		$cid = ($_REQUEST['cid']);
		//$location = "photo-gallery.php";
		$location= 'photo-gallery.php?q=photogallery&id='.$_REQUEST['cid']."&page=".$_REQUEST['page'];
	}break;
	
	default : break;
}
redirect ($location);
?>