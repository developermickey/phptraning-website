<?php
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['photo-category']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"category_id";
if( isset($_SESSION[SES]['photo-category']['order']) ) {
	if($_SESSION[SES]['photo-category']['order'] == "asc" ) $_SESSION[SES]['photo-category']['order'] = "desc";
	else $_SESSION[SES]['photo-category']['order'] = "asc";
}
else {
	$_SESSION[SES]['photo-category']['order'] = "desc";
}
redirect ($_SESSION[SES]['curpage']);
?>