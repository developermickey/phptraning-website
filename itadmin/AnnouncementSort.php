<?php
//SchoolSort.php
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['announcement']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"id";
if( isset($_SESSION[SES]['announcement']['order']) ) {
	if($_SESSION[SES]['announcement']['order'] == "asc" ) $_SESSION[SES]['announcement']['order'] = "desc";
	else $_SESSION[SES]['announcement']['order'] = "asc";
}
else {
	$_SESSION[SES]['announcement']['order'] = "desc";
}
redirect ($_SESSION[SES]['curpage']);
?>