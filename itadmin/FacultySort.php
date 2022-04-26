<?php
//facultiesSort.php
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['faculties-management']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"faculty_id";
if( isset($_SESSION[SES]['faculties-management']['order']) ) {
	if($_SESSION[SES]['faculties-management']['order'] == "asc" ) $_SESSION[SES]['faculties-management']['order'] = "desc";
	else $_SESSION[SES]['faculties-management']['order'] = "asc";
}
else {
	$_SESSION[SES]['faculties-management']['order'] = "asc";
}
redirect ($_SESSION[SES]['curpage']);
?>