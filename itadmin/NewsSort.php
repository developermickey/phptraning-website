<?php
//facultiesSort.php
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['news']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"id";
if( isset($_SESSION[SES]['news']['order']) ) {
	if($_SESSION[SES]['news']['order'] == "asc" ) $_SESSION[SES]['news']['order'] = "desc";
	else $_SESSION[SES]['news']['order'] = "asc";
}
else {
	$_SESSION[SES]['news']['order'] = "desc";
}
redirect ($_SESSION[SES]['curpage']);
?>