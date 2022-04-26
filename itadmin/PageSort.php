<?php
//SchoolSort
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['page-management']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"page_id";
if( isset($_SESSION[SES]['page-management']['order']) ) {
	if($_SESSION[SES]['page-management']['order'] == "asc" ) $_SESSION[SES]['page-management']['order'] = "desc";
	else $_SESSION[SES]['page-management']['order'] = "asc";
}
else {
	$_SESSION[SES]['page-management']['order'] = "desc";
}
redirect ($_SESSION[SES]['curpage']);
?>