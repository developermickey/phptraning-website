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
if($_REQUEST['act']=='sendMail'){
	if($_REQUEST['vercode']==$_SESSION["vercode"]){
	$name = $_REQUEST['name'];
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];
	$purpose = $_REQUEST['purpose'];	
	$address = $_REQUEST['address'];
	$email_from = "ahlawfirmhr@gmail.com"; // Who the email is from	
	$email_subject = "New Appointment Enquiry for AHLAWFIRM"; // The Subject of the email
	$email_message .= "Full Name : ".$name."<br>";
	$email_message .= "Phone No. : ".$phone."<br>";	
	$email_message .= "E-Mail ID : ".$email."<br>";
	$email_message .= "Purpose : ".$purpose."<br>";	
	$email_message .= "Address : ".$address."<br>";
    //$a = $Email;
	$a = "ahlawfirmhr@gmail.com,feroz@loudvisible.com"; // Who the email is to	
	$email_to=$a;
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: ".$email_from;
	//$headers .= "`CC: adhsupport@gmail.com";
	$ok = @mail($email_to, $email_subject, $email_message, $headers);
	if($ok)	
	{
	?>
      <script>window.location="appointment.php?msg=success";</script>
	<?php
	}else{
		header("location:appointment.php?msg=errcode");
	}
}
}

?>
<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Welcome | Contact  Us </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/blog/favicon.ico">
		
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
    <body class="blog contact">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- Header Area Start Here -->
        <?php include("header.php");?>
        <!-- Header Area End Here -->
       <!--  Banner Area Start here -->
       <div class="banner-area" >
         <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-bennar">
                  <h2> Appointment
                   </h2>
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
                      <li>Appointment</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
       <!--  Banner Area End here -->
      <!-- Main Contact page Start here -->
      <div class="contact-page-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="contact-form-area">
                <h2>APPOINTMENT</h2>
                <div>
                  <?php if ($_GET['strmsg1']) { ?>
                        <?php print $_GET['strmsg1']; ?> 
                        <?php } ?>
                </div>
                   <form role="form" name="contactform" method="post" id="frmcontact"  >
                              <input type="hidden" name="act" value="sendMail"> 
                    <fieldset>
                      <div class="col-sm-12">
                      <div class="form-group">
                        <?php
			if($_REQUEST['msg'] == "success")
			{
			?>
                    <div class="alert alert-success" align="center" style="padding: 10px;background: #b22222;color: #fff;margin: 5px;">
                  <strong>ThankYou!</strong> We will get back to you soon.
                   </div>
            <?php
			}
			?>

                        </div>
                        <div class="form-group">
                          <label>Name : </label>
                          <input type="text" name="name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Address : </label>
                          <input type="text" name="address" class="form-control" >
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Email ID : </label>
                          <input type="text" name="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Phone : </label>
                          <input type="text" name="phone" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Purpose : </label>
                          <input type="text" name="purpose" class="form-control" required>
                        </div>
                      </div>
                      <div class="form-group col-sm-12">

                                    <span class="bodytext">Code </span>

                                    <img src="captcha.php" align="absmiddle" style="border:1px solid #d9d9d9;" />

                                        <input name="vercode" type="text" class="txtfld form-field" id="textfield6" style="width:100px;" required placeholder="Enter Code" onFocus="if(this.value=='Enter Code' || this.value=='Enter Code'){ this.value=''; }" onBlur="if(this.value==''){ this.value='Enter Code'}"/>

                                        </div>
						<div class="col-sm-12">
                        <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary btn-custom">
                        </div>
                      </div>
                    </fieldset>
                </form>
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
      <!-- Main Contact page End here -->
      <!-- Partner Logo Area Start Here -->
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
      <!-- Footer Area End Here -->
		<!-- jquery
		============================================ -->		
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
    </body>
</html>
