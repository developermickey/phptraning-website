<?php
//PageSort.php
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['menu-management']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"menu_id";
if( isset($_SESSION[SES]['menu-management']['order']) ) {
	if($_SESSION[SES]['menu-management']['order'] == "asc" ) $_SESSION[SES]['menu-management']['order'] = "desc";
	else $_SESSION[SES]['menu-management']['order'] = "asc";
}
else {
	$_SESSION[SES]['menu-management']['order'] = "desc";
}
redirect ($_SESSION[SES]['curpage']);
?>