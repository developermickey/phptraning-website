<?php
//facultiesSort.php
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['notice-board']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"id";
if( isset($_SESSION[SES]['notice-board']['order']) ) {
	if($_SESSION[SES]['notice-board']['order'] == "asc" ) $_SESSION[SES]['notice-board']['order'] = "desc";
	else $_SESSION[SES]['notice-board']['order'] = "asc";
}
else {
	$_SESSION[SES]['notice-board']['order'] = "desc";
}
redirect ($_SESSION[SES]['curpage']);
?>