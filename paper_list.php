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
<?php
session_start();
$date=date('Y');
if(base64_decode($_REQUEST['key'])=="Browse Journals"){
$psql=mysql_query("select * from tbl_paper order by year desc");
}
else if(base64_decode($_REQUEST['key'])=="Recent Issues"){
$psql=mysql_query("select * from tbl_paper where year='$date' order by year desc");
}
else
{
$psql=mysql_query("select * from tbl_paper group by year");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>AH Law Firms Criminal Cases Kuwait | Cyber Crimes Kuwait </title>
<meta name="keywords" content="AH Law Firms Criminal Cases Kuwait | Cyber Crimes Kuwait " />
<meta name="description" content="AH Law Firms Criminal Cases Kuwait | Cyber Crimes Kuwait  is a Fully experienced Commercial and Corporate Lawyers Kuwait " />
<meta name="author" content="ahlawfirms.com" />
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
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>		<meta name="google-site-verification" content="IWt4nuWLSjtEx7ZaOZY6siH36wknmKBLdyXbQSe3dT0" />		<!--- Google Analytics -->		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172311407-1"></script>		<script>		  window.dataLayer = window.dataLayer || [];		  function gtag(){dataLayer.push(arguments);}		  gtag('js', new Date());		  gtag('config', 'UA-172311407-1');		</script>
</head>
<body>
<div>
  <?php include("header.php");?>

  <div class="banner-area" >
         <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-bennar">
                  <h2> Case Studies</h2>
                  <div class="breadcumb">
                    <ul>
                      <li> <a href="index.php">Home</a> 
                  <?php
					  $id = $_REQUEST['id'];
					  $i = 1;
					  $get_banner = $Dbqur->fetch_data("tbl1_testimonial","id = '$id'");
					  foreach($get_banner as $get_key){		
	              ?>
                 <li> <?=$get_key['title'];?></li>
                  <?php
					 $i++;
				   	   } 
				   ?>
                   </li>
                      <li>Case Studies</li>
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
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="single-blog-post">
            <h2> <?php if(base64_decode($_REQUEST['key'])=="Browse Journals"){ 
			  echo  "List of Papers";
			  }
			  else if(base64_decode($_REQUEST['key'])=="Recent Issues")
			  {
			  echo "Recent Issues";
			  }
			  else
			  {
			  echo "Case Studies";
			  }
			  ?></h2>
              <div>
    	<div align="justify">
           <?php if ($_GET['strmsg']) { ?>
              <div></div>
			  <?php print $_GET['strmsg']; ?> 
              <div></div>
                        <?php } ?>
         <form id="form1" name="form1" method="post" action="enquiry.php?stage=1" onSubmit="return validform();" enctype="multipart/form-data">
                              <?php
							  $i = 1;
							  while($row=mysql_fetch_assoc($psql)){
							  ?>
        <div class="panel-group no-list" id="accordion1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<div class="panel-title">
											<!-- Tab -->			
											<a data-toggle="collapse" data-parent="#accordion1" href="#<?=$i;?>" aria-expanded="false" class="collapsed">
												<i class="fa fa-plus"></i> <?php echo $get_year= $row['year']; ?>
											</a>
										</div>
									</div>
									<div id="<?=$i;?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                  
										
                                       <?php 
									    $get_data=mysql_query("select * from tbl_paper where year='$get_year' group By month");
										  while($volumerow=mysql_fetch_assoc($get_data)){
										?>
                                      <?php  if( $volumerow['month']!='') {?>
                                        <div class="panel-body">
                                       
                                       <div class="col-md-12">
                                       <div class="view-row">
                                       	<div><strong>Case Study: <span style="font-weight:100;color:#000"><a href="paper_detail.php?id=<?=base64_encode($volumerow['id'])?>&casestd=<?=$volumerow['month'];?>" style="color:#000"><?=$volumerow['month']; ?></a></span></strong></div>
                                        <div><h1 class="casestudy-h1"><?=$volumerow['title'];?></h1></div>
                                        <div><p><?=$volumerow['auther1'];?></p></div>
                                        <div><a href="paper_detail.php?id=<?=base64_encode($volumerow['id'])?>&casestd=<?=$volumerow['month'];?>" class="btn btn-primary">Read More <i class="fa fa-angle-double-right"></i> </a></div>
                                       </div>
                                       </div>
                                       </div>
                                       <?php 
									   }else{
									   ?>
                                       <?php
									   }
									   }
									   ?>
                                       
									</div>
                                    
								</div>
							</div>
                                <?php
								 $i++;
								 } 
								 
								
								 ?>
                              </form>
		</div>
    </div>
            </div>
          
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="blog-sidebar-area">
              <div class="single-sidebar">
                <h2>Services</h2>
                <div class="sidebar-category">
                  <ul>
                  <?php
				  $i = 1;
				  $get_banner = $Dbqur->fetch_data("tbl1_testimonial","","id asc");
				  foreach($get_banner as $get_key){		
	              ?> 
                    <li><a href="services.php?id=<?=$get_key['id'];?>"><?=$get_key['title'];?></a></li>
                    <?php
					 $i++;
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
  <div class="client-logo-area">
        <div class="container">
        <div class="section-title-area">
                      <h2>GLOBAL AFFILIATIONS</h2>
                      </div>
          <div class="client-logo">
          <?php
				  $i = 1;
				  $get_banner = $Dbqur->fetch_data("tbl_affilation","","id asc");
				  foreach($get_banner as $key){		
	            ?>
            <div class="single-logo">
              <a href="#"><img src="images/logo_client/<?=$key['logo'];?>" alt=""></a>
            </div>
             <?php
           $i++;
           } 
		  ?>
          </div>
        </div>
      </div>
  <?php 
  include("footer.php");
  ?>
</div>
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="js/wow.min.js"></script>
		<!-- price-slider JS
		============================================ -->		
        <script src="js/jquery-price-slider.js"></script>		
		<!-- meanmenu JS
		============================================ -->		
        <script src="js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="js/plugins.js"></script>
        <!-- Nivo slider js
        ============================================ -->        
        <script src="custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="custom-slider/home.js" type="text/javascript"></script>
		<!-- main JS
		============================================ -->		
        <script src="js/main.js"></script>
<!-- Scripts -->
</body>
</html>
