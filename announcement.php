<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("includes/classes/Pages.cls.php");
require_once("includes/classes/Menus.cls.php");
require_once("includes/classes/Announcement.cls.php");
require_once("includes/classes/DBquery.cls.php");


$db = new SiteData();
$dbObj = new dbquery();
$Dbqur = new dbquery();
$pageObj = new Pages();
$menuObj = new Menus();
$announcementObj = new Announcement();
if(isset($_REQUEST['announcement'])) {
	$announcement = cleanInput($_REQUEST['announcement']);
	$anno_res = $announcementObj->getAnnouncementByUrl($announcement);
	if($anno_res['NO_OF_ITEMS'] == 0){redirect(SITE_HOME."announcement.php");}

	if($anno_res['NO_OF_ITEMS']>0) {
		$page_title = outText($anno_res['oDATA'][0]['title']);
	}
	else {
		$page_title = "All Announcement";
	}
}
else {
	$page_title = "All Announcement";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>Upcoming Courses | Nviron Consulting Pvt Ltd</title>
        <meta name="keywords" content="Upcoming Courses | Nviron Consulting Pvt Ltd">
        <meta name="description" content="Upcoming Courses | Nviron Consulting Pvt Ltd">
        <meta name="keywords" content="Nviron Consulting Pvt Ltd" />
        <meta name="description" content="Nviron Consulting Pvt Ltd" />
        <meta name="author" content="Nviron Consulting Pvt Ltd" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="copyright" content="Copyright 2019 Nviron knowledge solution, Bhubaneswar,Odisha,India"/>
<meta name="ROBOTS" content="index,follow"/> 
<meta name="revisit-after" content="3 days"/> 
<meta name="document-classification" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers multi-disciplinary training solutions,Environmental health & safety knowledge solution to Industries, corporations, and individuals across the country."/>
<meta name="publisher" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers multi-disciplinary training solutions,Environmental health & safety knowledge solution to Industries, corporations, and individuals across the country. "/> 
<meta name="author" content="http://www.nviron.in/"/> 
<meta name="copyright" content="http://www.nviron.in/"/> 
<meta name="language" content="en-us"/> 
<meta name="distribution" content="GLOBAL"/> 
<meta name="geo.region" content="INDIA"/> 
<meta name="geo.placename" content="Odisha"/> 
<meta name="rating" content="General"/>  

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
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>		<meta name="google-site-verification" content="IWt4nuWLSjtEx7ZaOZY6siH36wknmKBLdyXbQSe3dT0" />		<!--- Google Analytics -->		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172311407-1"></script>		<script>		  window.dataLayer = window.dataLayer || [];		  function gtag(){dataLayer.push(arguments);}		  gtag('js', new Date());		  gtag('config', 'UA-172311407-1');		</script>
</head>
<body>
<div id="page">
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
                  <h1>Upcoming Course</h1>
                  <div class="breadcumb">
                    <ul>
                      <li> <a href="index.php">Home</a> </li>
                      <li>Upcoming Course</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
        <section id="about-us" class="page-section total-blog-area" style="padding-bottom:20px;">
        <div class="container">
          <div class="row">
        <div class="col-md-9">
    
    <div>
    	<?php include("includes/announcement_body_content.php"); ?>
    </div>
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="blog-sidebar-area">
              <div class="single-sidebar">
                <h2>Quick Links</h2>
                <div class="sidebar-category">
                      
                <?php 
                
            $get_menu = $Dbqur->fetch_data("ihm_menus", "menu_page = $page_id");

          $get_all_sub_menu = $Dbqur->fetch_data("ihm_menus", "menu_pid = '".$get_menu[0]['menu_pid']."'","menu_position asc, menu_name asc");
         //echo $get_all_sub_menu[0]['menu_name'];exit;
        ?>
               
          <?php //include('includepage/major_macilities_left_menu.php');?> 
                    <div class="propertyTypesWidget sidebarWidget" >
      <ul class="list03">
      <?php
            foreach($get_all_sub_menu as $key){
              //echo  $key['menu_name'];
      if(is_numeric($key['menu_page'])){
        $get_page_url = $Dbqur->fetch_data("ihm_pages","page_id = '".$key['menu_page']."'");
          ?>
            <a href="page.php?page=<?=$get_page_url[0]['page_url'];?>"><li <?php if($_REQUEST['page'] == $get_page_url[0]['page_url']){?>class="active"<?php } ?> >
            <?=$key['menu_name'];?>
          </li></a>
          
          <?php
      }else{ ?>
        <a href="<?=$key['menu_page'];?>"><li>
            <span>   </span>
            <?=$key['menu_name'];?>
          </li></a>
      <?php }
      }
      ?>
            
      </ul>   
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
              
           </div>
        </div>
        </section>
  <?php 
  include("footer.php");
  ?>
    </div>

</body>
</html>
