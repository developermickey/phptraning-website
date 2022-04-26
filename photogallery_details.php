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
$image = stripslashes($res['oDATA'][0]['image']);
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

        <title>operation & maintenance & troubleshooting of Wastewater treatment</title>
        <meta name="keywords" content="operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training Centre ">
        <meta name="description" content="Nviron Consulting Pvt Ltd provides operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training to Industries, corporations, and individuals">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="copyright" content="Copyright 2018 Nviron knowledge solution, Bhubaneswar,Odisha,India"/>
<meta name="ROBOTS" content="index,follow"/> 
<meta name="revisit-after" content="3 days"/> 
<meta name="document-classification" content="Nviron Consulting Pvt Ltd provides operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training to Industries, corporations, and individuals"/>
<meta name="publisher" content="Nviron Consulting Pvt Ltd provides operation & maintenance and troubleshooting of Wastewater treatment plant, Environmental Health & Safety Training to Industries, corporations, and individuals"/> 
<meta name="author" content="http://www.nviron.in/"/> 
<meta name="copyright" content="http://www.nviron.in/"/> 
<meta name="language" content="en-us"/> 
<meta name="distribution" content="GLOBAL"/> 
<meta name="geo.region" content="INDIA"/> 
<meta name="geo.placename" content="Odisha"/> 
<meta name="rating" content="General"/> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
        <link rel="stylesheet" href="dist/css/lightbox.min.css">     
		<!-- modernizr JS
		============================================ -->		
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>		<meta name="google-site-verification" content="IWt4nuWLSjtEx7ZaOZY6siH36wknmKBLdyXbQSe3dT0" />		<!--- Google Analytics -->		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172311407-1"></script>		<script>		  window.dataLayer = window.dataLayer || [];		  function gtag(){dataLayer.push(arguments);}		  gtag('js', new Date());		  gtag('config', 'UA-172311407-1');		</script>
</head>
<body>
<div> 


  <?php include("header.php");?>
<?php if($image!=''){ ?>
  <div class="banner-area" style="background:url(images/logo_client/<?=$image;?>)0px 0px">
   <?php
          } else{
		?>
   <div class="banner-area" style="background:url(img/page-bennar.jpg)0px 0px">
 <?php
 }
 ?>
     <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-bennar">
                  <h1>Photo Gallery</h1>
                  <div class="breadcumb">
                    <ul>
                      <li> <a href="index.php">Home</a> </li>
                      <li>Photo Gallery</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
  
<div class="total-blog-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div>	
            <a  href="photogallery.php" style="display:block;margin-bottom:20px;"><img src="img/go-back.png" width="100" height="25"></a>		 
			<div class="row">
              <div id="mix-container" class="portfolio-grid animated fadeInUp visible" data-animation="fadeInUp">				                            
                    <?php
					$id=$_REQUEST['pic_cat'];
                    		$sql=mysql_query("SELECT * FROM ihm_photo_gallery WHERE photo_category='$id'");
					while($data=mysql_fetch_array($sql)){
					?>
                                                
                                      <div class="grids col-xs-12 col-sm-6 col-md-4 mix all web" style="display: inline-block;">
					<div class="grid">
                    <a  href="photo/<?php echo $data['photo_file'];?>" class="example-image-link" data-lightbox="example-set" >
                    <span>
                    <i class="fa fa-search"></i>
                    </span>
						<img src="photo/<?php echo $data['photo_file'];?>" style="width:100%;" alt="Recent Work" class="img-responsive">
                        </a>
						<?php /*?><div class="figcaption" style="text-align:center">
							
							<!-- Image Popup-->
							<a href="photo/<?php echo $data['photo_file'];?>" data-rel="prettyPhoto[portfolio]">
							<i class="fa fa-search"></i>
							</a>
							
						</div><?php */?>
					</div>
				</div>          		                      
              <?php
                }
				?>
				</div>		
		</div>
		</div>
          </div>
          
        </div>
      </div>
    </div>
  <?php 
  include("footer.php");
  ?>
</div>
 
</body>
</html>
