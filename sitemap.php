<?php
//index.php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("includes/classes/Pages.cls.php");
require_once("includes/classes/Menus.cls.php");
require_once("includes/classes/DBquery.cls.php");
require_once("includes/classes/News.cls.php");
$newsObj = new News();
$res = $newsObj->getNewsLimit(6);
$db = new SiteData();
$pageObj = new Pages();
$menuObj = new Menus();
$Dbqur = new dbquery();
if(isset($_GET['page'])){
$url = filter($_REQUEST['page']);
$res = $pageObj->getPageByUrl($url); 
$total = $res['NO_OF_ITEMS'];
$page_name = stripslashes($res['oDATA'][0]['page_name']);
$page_contents = stripslashes($res['oDATA'][0]['page_contents']);
$page_type = stripslashes($res['oDATA'][0]['page_type']);
$page_title = stripslashes($res['oDATA'][0]['page_title']);
$page_metadesc = stripslashes($res['oDATA'][0]['page_metadesc']);
$page_metakeywords = stripslashes($res['oDATA'][0]['page_metakeywords']);
if($total == 0){redirect(SITE_HOME."index.php");}
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>Environmental health & safety knowledge solution provider</title>
<meta name="keywords" content="Environmental health & safety knowledge solution provider, Environmental Health & Safety Training Centre ">
<meta name="description" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers training solutions, Environmental health & safety knowledge solution to Industries, corporations, and individuals">        
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="copyright" content="Copyright 2018 Nviron knowledge solution, Bhubaneswar,Odisha,India"/>
<meta name="ROBOTS" content="index,follow"/> 
<meta name="revisit-after" content="3 days"/> 
<meta name="document-classification" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers training solutions, Environmental health & safety knowledge solution to Industries, corporations, and individuals"/>
<meta name="publisher" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers training solutions, Environmental health & safety knowledge solution to Industries, corporations, and individuals"/> 
<meta name="author" content="http://www.nviron.in/"/> 
<meta name="copyright" content="http://www.nviron.in/"/> 
<meta name="language" content="en-us"/> 
<meta name="distribution" content="GLOBAL"/> 
<meta name="geo.region" content="INDIA"/> 
<meta name="geo.placename" content="Odisha"/> 
<meta name="rating" content="General"/> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!-- Favicon -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		<!-- Google Fonts
		============================================ -->		
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <!-- nivo slider CSS
        ============================================ -->
        <link rel="stylesheet" href="custom-slider/css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="custom-slider/css/preview.css" type="text/css" media="screen" />
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="css/main.css">        
        <!-- nivo slider CSS
        ============================================ -->
        <link rel="stylesheet" href="custom-slider/css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="custom-slider/css/preview.css" type="text/css" media="screen" />
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS
    ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr JS
		============================================ -->		
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<style>
		* { box-sizing:border-box; }
		h1 { font-size: 26px; }
		div.section { overflow:hidden; width:100%; -webkit-column-count:3; -moz-column-count:3; column-count:3; padding: 190px; padding-top: 150px; }
		div.section div { display:inline-block; border:#ccc solid 1px; border-radius:5px; width:30%; min-width:300px; max-width:99%; margin:16px 1%; padding:12px; background:#fff; box-shadow:0 3px 3px #666; }
		div.section div:before { display:block; content: ""; position:relative; left:50%; width:1px; height:32px; margin:-44px 0 12px 4px; background:#ccc; }
		div.section p { font-weight:bold; text-align:center; overflow:hidden; position:absolute; width:100%; left:0; margin-top:-50px; }
		div.section p:after { display:block; content: ""; position:relative; width:67.5%; max-width:656px; height:1px; box-sizing:border-box; margin:-14px auto 0 auto; background:#ccc; }
		div.section p a { margin:0 auto; float:none; }
		div.section p a:after { display:block; content: ""; position:relative; left:50%; width:1px; height:32px; background:#ccc; }
		div.PageBreak { margin-top:16px; }
		div.PageBreak span { font-weight:bold; }
		div.footerinfo { margin-top:16px; color:#666; font-size:12px; text-align:right; }
		div.footerinfo * { font-size:12px; }
		@media only screen and (max-width:800px) { div.section div { width:50%; } div.section { -webkit-column-count:2; -moz-column-count:2; column-count:2; } }
		@media only screen and (max-width:500px) { div.section div { width:100%; } div.section { -webkit-column-count:1; -moz-column-count:1; column-count:1; } div.section p:after, div.section p a:after { display:none; } }
	    </style>
		
</head>
<body>
<div>
  <?php include("header.php"); ?>
  
	<div class="section">
		<p><a href="https://www.nviron.in/">Home page</a></p>
		<div><a href="https://www.nviron.in/">Environmental health & safety knowledge solution provider India</a></div>

		<div><a href="https://www.nviron.in/page.php?page=about-us">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/page.php?page=nebosh-international-general-certificate-cuttack-bhubaneswar-odisha">NEBOSH IGC ODISHA</a></div>

		<div><a href="https://www.nviron.in/course-details.php?id=119">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/course-details.php?id=157">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/course-details.php?id=99">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=iso-9001-2015-lead-auditor-certified-by-cqi-irca">ISO 9001: 2015 Lead Auditor certified by CQI IRCA</a></div>

		<div><a href="https://www.nviron.in/page.php?page=iso-14001-2015-lead-auditor-certified-by-cqi-irca">ISO 14001 Lead Auditor certified by CQI IRCA</a></div>

		<div><a href="https://www.nviron.in/page.php?page=iso-45001-2018-lead-auditor-certified-by-cqi-irca">ISO 45001:2018 Lead Auditor certified by CQI IRCA</a></div>

		<div><a href="https://www.nviron.in/course-details.php?id=103">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=fire-safety-audit">Fire Safety Audit</a></div>

		<div><a href="https://www.nviron.in/page.php?page=process-safety-management-audit">Process Safety Management Audit</a></div>

		<div><a href="https://www.nviron.in/page.php?page=construction-safety-audit">Construction Safety Audit</a></div>

		<div><a href="https://www.nviron.in/page.php?page=electrical-safety-audit">Electrical Safety Audit</a></div>

		<div><a href="https://www.nviron.in/page.php?page=equality-and-diversity-policy">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=health-safety">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=data-protection-policy">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=complaint-and-dispute-resolution-policy">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=payment-policy">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=deferment-policy-procedure">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=refund-cancellation-policy">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=sehedule-of-classes">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/attorney-details.php">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/photogallery.php">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/videogallery.php">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=careers-at-ncpl">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=contact-us">operation & maintenance &troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/page.php?page=hse-officer-duties.">HSE officer duties.</a></div>

		<div><a href="https://www.nviron.in/page.php?page=how-nebosh-can-help-you-become-a-qualified-safety-officer-">How NEBOSH can help you become a qualified safety officer?</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=3">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=4">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=1">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=2">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=8">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=6">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=10">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/attorney.php?id=5">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=75">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=18">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=52">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=53">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=54">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=55">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=56">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=57">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=58">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=59">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=61">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=64">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=65">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=68">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=69">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=70">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=71">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=72">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=73">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=74">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=76">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=77">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/all-courses.php?id=78">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/news.php?news=nviron-is-offering-nebosh-igc-in-cuttack-bhubanesw">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/news.php">Environmental health & safety knowledge solution provider</a></div>

		<div><a href="https://www.nviron.in/index.php">Environmental health & safety knowledge solution provider India</a></div>

		<div><a href="https://www.nviron.in/photogallery_details.php?pic_cat=23&cat_nm=NEBOSH%20COurse">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/photogallery_details.php?pic_cat=22&cat_nm=NVIRON%20Training%20Bhubaneswar">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/photogallery_details.php?pic_cat=20&cat_nm=Nviron%20Training%20in%20chennai">operation & maintenance & troubleshooting of Wastewater treatment</a></div>

		<div><a href="https://www.nviron.in/photogallery_details.php?pic_cat=19&cat_nm=Nviron%20Training%20Workshop">operation & maintenance & troubleshooting of Wastewater treatment</a></div>
</div>

  <?php include("footer.php"); ?>
</div>
 
</body>
</html>
