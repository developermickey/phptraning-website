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
        <title>operation & maintenance & troubleshooting of Wastewater treatment</title>
        <meta name="keywords" content="operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training Centre">
        <meta name="description" content="Nviron Consulting Pvt Ltd provides operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training to Industries, corporations, and individuals">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="copyright" content="Copyright 2018 Nviron knowledge solution, Bhubaneswar,Odisha,India"/>
<meta name="ROBOTS" content="index,follow"/> 
<meta name="revisit-after" content="3 days"/> 
<meta name="document-classification" content="Nviron Consulting Pvt Ltd provides operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training to Industries, corporations, and individuals"/>
<meta name="publisher" content="Nviron Consulting Pvt Ltd provides operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training to Industries, corporations, and individuals "/> 
<meta name="author" content="http://www.nviron.in/"/> 
<meta name="copyright" content="http://www.nviron.in/"/> 
<meta name="language" content="en-us"/> 
<meta name="distribution" content="GLOBAL"/> 
<meta name="geo.region" content="INDIA"/> 
<meta name="geo.placename" content="Odisha"/> 
<meta name="rating" content="General"/>    
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>
<?=PAGE_TITLE?>
</title>
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
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>		<meta name="google-site-verification" content="IWt4nuWLSjtEx7ZaOZY6siH36wknmKBLdyXbQSe3dT0" />		<!--- Google Analytics -->		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172311407-1"></script>		<script>		  window.dataLayer = window.dataLayer || [];		  function gtag(){dataLayer.push(arguments);}		  gtag('js', new Date());		  gtag('config', 'UA-172311407-1');		</script>
</head>
<body>
  <?php include("header.php");?>
  <div class="banner-area" style="background:url(img/page-bennar.jpg)0px 0px">
  <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-bennar">
                  <h1>Video Gallery</h1>
                  <div class="breadcumb">
                    <ul>
                      <li> <a href="index.php">Home</a> </li>
                      <li>Video Gallery</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
  <!-- slider -->
  <div class="total-blog-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="single-blog-post">
            
             <?php
                $sql="SELECT * FROM tbl_video ORDER BY id DESC";
				$query=mysql_query($sql);
				while($vrow=mysql_fetch_array($query)){
				?>
                <div class="col-md-3">
                	<div>
                       <iframe width="100%" height="260" src="<?=$vrow['video_link'];?>" frameborder="0" allowfullscreen></iframe> 
                    </div>
                    <div class="category" style="height:50px; text-align:center;">  <?php echo $vrow['video_title'];?></div>                     
                </div>
                <?php
                }
		  		?>	
            </div>
          
          </div>
          
        </div>
      </div>
    </div>
  <?php 
  include("footer.php");
  ?>
  <!-- footer -->


</body>
</html>
