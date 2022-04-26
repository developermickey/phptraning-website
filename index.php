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
require_once("includes/classes/Announcement.cls.php");
$newsObj = new News();
$res = $newsObj->getNewsLimit(6);
$total = $res['NO_OF_ITEMS'];

$annoObj = new Announcement();
$resa = $annoObj->getAnnoLimit(5);
$totaly = $resa['NO_OF_ITEMS'];

$db = new SiteData();
$pageObj = new Pages();
$menuObj = new Menus();
$Dbqur = new dbquery();
if($_REQUEST['act']=='sendMail'){
	
	if($_REQUEST['vercode']==$_SESSION["vercode"]){
	

	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$mob = $_REQUEST['mob'];
	$course = $_REQUEST['course'];	
	$pst = $_REQUEST['pst'];
	$message = $_REQUEST['message'];	

	$email_from = $email; // Who the email is from
	$email_subject = "New Training Enquiry for NVIRON"; // The Subject of the email
	$email_message .= "Name : ".$name."<br>";
	$email_message .= "Email Address : ".$email."<br>";
	$email_message .= "Phone No : ".$mob."<br>";	
	$email_message .= "Course Selected : ".$course."<br>";	
	$email_message .= "Planned Date : ".$pst."<br>";	
	$email_message .= "Message/Query : ".$message."<br>";	
    //$a = $Email;
	//$a = "mr.swadhin.barik@gmail.com"; // Who the email is to
	$a = "training@nviron.in"; // Who the email is to
	$email_to = $a;
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: ".$email_from. "\r\n";
	$headers .= "CC: ".$email. "\r\n";
	//$headers .= "`CC: adhsupport@gmail.com";
	$ok = @mail($email_to, $email_subject, $email_message, $headers);
	if($ok)	
	{
	?>
     <script>window.location="index.php?msg=success";</script>
    <?php
	}else{
		header("location:index.php?msg=errcode");
	}
}
}
?>
<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Environmental health & safety knowledge solution provider India</title>
        <meta name="keywords" content="Environmental health & safety knowledge solution provider odisha India, Environmental Health & Safety Training Centre ">
        <meta name="description" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers training solutions, Environmental health & safety knowledge solution to Industries, corporations, and individuals ">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="copyright" content="Copyright 2018 Nviron knowledge solution, Bhubaneswar,Odisha,India"/>
<meta name="ROBOTS" content="index,follow"/> 
<meta name="revisit-after" content="3 days"/> 
<meta name="document-classification" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers multi-disciplinary training solutions,Environmental health & safety knowledge solution to Industries, corporations, and individuals across the country."/>
<meta name="publisher" content="Nviron Consulting Pvt Ltd is one of most emerging knowledge Sharing platform, offers multi-disciplinary training solutions,Environmental health & safety knowledge solution to Industries, corporations, and individuals across the country. "/> 
<link rel="canonical" href="http://www.nviron.in/" />
<meta name="author" content="http://www.nviron.in/"/> 
<meta name="copyright" content="http://www.nviron.in/"/> 
<meta name="language" content="en-us"/> 
<meta name="distribution" content="GLOBAL"/> 
<meta name="geo.region" content="INDIA"/> 
<meta name="geo.placename" content="Odisha"/> 
<meta name="rating" content="General"/>       
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
		<meta name="google-site-verification" content="IWt4nuWLSjtEx7ZaOZY6siH36wknmKBLdyXbQSe3dT0" />
		<!--- Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172311407-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-172311407-1');
		</script>
    </head>
    <body>
<?php include("header.php");?>
        <div class="slider-area">

            <div class="bend niceties preview-2">
             
                <div id="ensign-nivoslider" class="slides"> 
                 <?php
				  $i = 1;
				  $get_banner = $Dbqur->fetch_data("tbl_banner","","banner_sequence asc");
				  foreach($get_banner as $get_key){		
	            ?>
                    <img src="upload_image/<?php echo $get_key['banner_image'] ?>" alt="<?php echo $get_key['banner_name'] ?>" title="#slider-direction-<?php echo $i;?>"  />
                     <?php
					   $i++;
					    } 
					 ?>
                </div>
                 <?php
				  $i = 1;
				  $get_banner = $Dbqur->fetch_data("tbl_banner","","banner_sequence asc");
				  foreach($get_banner as $get_key){		
	            ?>
                 <div id="slider-direction-<?php echo $i;?>" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-cn s-tb slider-<?php echo $i;?>">
                        <div class="title-container s-tb-c title-compress">
                        </div>
                    </div>  
                </div>
          
                  <?php
					 $i++;
					   } 
				 ?>
                
            </div>
        </div>
        <div class="container-fluid our-practice-area relative" style="    padding-top: 0;
    background-color: #fecb51;    background-image: linear-gradient(180deg, #ff4a6e 0%, #ff8151 51%, #fecb51 100%);
    color: #ffffff;    overflow: hidden;">
       <div class="container">
        <div align="center" >
       	<h2 class="upcoming">Upcoming Courses</h2>

        </div>
		<ul id="demo3">

<?php
	for($i=0;$i<$totaly;$i++){
		$id = ($resa['oDATA'][$i]['id']);
		$type = outText($resa['oDATA'][$i]['type']);
		$title = outText($resa['oDATA'][$i]['title']);
		$url = outText($resa['oDATA'][$i]['url']);
		$publish_date = outText($resa['oDATA'][$i]['publish_date']);
		$pdate=date("d.m.Y",strtotime($publish_date));
		$link = ($resa['oDATA'][$i]['link']);
		$venue = ($resa['oDATA'][$i]['venue']);
		$file_name = ($resa['oDATA'][$i]['file_name']); 
		$new = $resa['oDATA'][$i]['new'];
		
		?>
   <?php if($type == 2){?>
<li class="news-item"> <div>
<div class="desc_col">
                                        <div class="news_content">
                                            <h5 class="news_title news_title2"><a href="<?=$link?>"><?=$pdate?> <?=$title?></a><?php if($new ==1){?><img alt="Environmental health & safety knowledge solution provider India"  src="img/new.gif"  border="0" align="absmiddle"/><?php }?></h5>
                                            <a href="<?=$link?>" class="button2">Read more...</a>
                                            
                                        </div>
                                    </div>

                             </div>
                             </li>
   <?php }?>
<?php if($type == 1){?>        
<li class="news-item"> <div >
<div class="desc_col">
                                        <div class="news_content">
                                            <h5 class="news_title news_title2"><a href="<?=SITE_HOME?>announcement/<?=$file_name?>"><?=$pdate?> <?=$title?> </a> <?php if($new ==1){?><img alt="Environmental health & safety knowledge solution provider India"  src="img/new.gif"  border="0" align="absmiddle"/><?php }?>  </h5>
                                            <a href="<?=SITE_HOME?>announcement/<?=$file_name?>" class="button2">Read more...</a>
                                         
                                        </div>
                                    </div>
                             </div>
                             </li>
<?php }?>
<?php if($type == 0){?>                                                      
<li class="news-item"> <div>
<div class="desc_col">
                                        <div class="news_content">
                                            <h5 class="news_title news_title2"><a href="announcement.php?announcement=<?php print $url;?>"><?=$pdate?> <?=$title?></a><?php if($new ==1){?><img alt="Environmental health & safety knowledge solution provider India"  src="img/new.gif"  border="0" align="absmiddle"/><?php }?></h5>
                                            <a href="announcement.php?announcement=<?php print $url;?>" class="button2">Read more...</a>
                                            
                                        </div>
                                    </div>

                             </div>
                             </li>
		   <?php }
}
?>           
                             
                             
</ul>
       </div>
         </div>
           <?php /*?>
       <div class="container-fluid our-practice-area relative" style="padding-top:0">
       <div class="container">
        <div align="center" class="section-title-area">
       	<h2 class="v-heading">Portfolio</h2>
        <p>one of most emerging knowledge Sharing platform, offers multi-disciplinary training solutions to Industries, corporations, and individuals across the country.</p>
        </div>
		<div class="container course-list">
      
      <?php 
      $i=1;
      $cData=$Dbqur->fetch_data("ihm_menus","menu_pid=2 and menu_status=1","","5");
      //print_r($cData);
      foreach($cData as $portData){
        $menu_pid=$portData['menu_id'];
        if($i==1){
          $class="color1 ";
        }
        if($i==2){
          $class="color1 color2";
        }
        if($i==3){
          $class="color1 color3";
        }
        if($i==4){
          $class="color1 color4";
        }
		if($i==5){
          $class="color1 color5";
        }
       ?>
      <!-- box start -->

      <!-- color1 color2 color3 color4  -->
        	<div class="col-md-2 box-shadow">
            <div class="<?=$class?>">
              <div class="icon">
              	<h2><?=$portData['menu_name']?></h2><!-- submenu name -->
              </div>
            </div>
            <div class="list">
              <!-- course name -->
              <ul>
                <?php 
                $course_pid_Data=$Dbqur->fetch_data("tbl_course","menu_id='$menu_pid' and status=1","","4");
                foreach($course_pid_Data as $course_data){
                 ?>
                <li><a href="course-details.php?id=<?php echo $menu_pid ; ?>"><?=$course_data['title']?></a></li>
                <?php } ?>
              </ul>
            <!-- ./. course name -->

            </div>
          </div>
      <!-- ./. box start -->
    <?php $i++; } ?>
        </div>
       </div>
         </div>
         <?php */?>
         
         
         
         <div class="build-path">
        <div class="container" style="padding:25px 0;">
        <h1 align="center" style="border-bottom:1px solid #ddd;color:#fff;font-size:30px;">   Our Credential  </h1>
        <div>
        <p style="color:#fff;" align="center">Nviron has an enviable placement record since its inception.<br>
Every year we create around 50,000 new job opportunities through various Mega Job Fests and Pool Campuses across the country.</p>
        </div>
        <div class="col-md-3 col-sm-3 timed-line"><h2>1000+ <span>Delegates </span></h2></div>
        <div class="col-md-3 col-sm-3 timed-line"><h2>100+ <span>Experts </span></h2></div>
        <div class="col-md-3 col-sm-3 timed-line"><h2>200+ <span>Courses </span></h2></div>
        <div class="col-md-3 col-sm-3 timed-line"><h2>25+ <span>Location</span></h2></div>                        
        </div>
     </div>
       </div>
       <style type="text/css">

 </style> 
       <div class="image-overlay-container" id="people-container">
	    <div class="container" id="people-main">
		  <div class="section-cta">
<div class="row">
<div class="col-md-6"><img class="img-responsive" src="img/partner.jpg" alt="Environmental health & safety knowledge solution provider India"></div>
<div class="col-md-6">
<div class="row">
<div class="col-md-12 overlay-content">
<!--<div class="category"><em>&nbsp;</em></div>-->
<div class="title"><span>Partner</span></div>
</div>
<div class="col-md-12 text-content">
<div class="description">
<p>NEBOSH offers the following courses to both the internal (staff) and external (wider public) which covers over 96 sanitation and sewerage programmes up to 2018.  We have designed and customized sessions for over 40 organizations, 6800 participants and 7 countries all over Asia and Africa.  All of our programmes are met with international and local standards in order to uphold the authenticity, principles and originality to educate sewerage awareness for economic advantages and environmental protection. <a href="https://www.iwk.com.my/cms/upload_files/files/Capacity%20Building%20IWTC.pdf" style="color:#fff905" target="_blank">Click here</a> for IWTC's Capacity Building for people proposal and if you would like to know more about us, please <a href="https://www.iwk.com.my/cms/upload_files/files/Introduction%20to%20IWK%20(short%20version)%202017-1.pdf" style="color:#fff905" target="_blank">start here.</a></p>
</div>

</div>
</div>
</div>
</div>
</div>
		 </div>
	    </div>
      <div class="happy-client-area angeled-path2">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="section-title-area vh2">
                 <h2>Testimonials</h2>
                 <!--<p>NCPL has the expertise in Instructional Design, training delivery, Sourcing right trainer, consulting, which makes us stand tall in the market.</p>-->
               </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="client-section-area">
                <div class="client-section">
                <?php
				  $i = 1;
				  $get_banner = $Dbqur->fetch_data("tbl_client","","id asc");
				  foreach($get_banner as $get_key){		
	            ?>
                  <div class="single-client-area">
                    <p><img alt="Environmental health & safety knowledge solution provider India" src="img/quote.png"  class="pull-left" width="15"><?=$get_key['client_desc'];?></p>
                    <h3><a href="#"><?=$get_key['client_name'];?></a></h3>
                  </div>
                
                  <?php
					 $i++;
					   } 
				 ?>
                </div>
               </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mid-section" id="midsection">
      <div class="container">
      	<div class="col-md-4 col-sm-4">
        	<div class="color6">
            <h2>Employee and Team <span>Training Solutions</span></h2>
            <div class="form">
            <form role="form" name="contactform" method="post">
             <input type="hidden" name="act" value="sendMail"> 
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
            <input type="text" name="name" id="textfield" class="form-control" placeholder="Name" required >
            </div>
            <div class="form-group">
            <input type="email" name="email" id="textfield2" class="form-control" placeholder="Email ID" required >
            </div>
            <div class="form-group">
            <input type="text" name="mob" id="textfield3" class="form-control" pattern="[0-9]{10}" placeholder="Mobile" title="Phone No. Should be Numerics" required >
            </div>
            <div class="form-group">
            <textarea name="course" id="textfield4" class="form-control bg-white" style="resize:none" placeholder="Courses" required></textarea>
            </div>
            <div class="form-group">
            <strong style="color:#fff;font-weight:100">Planning to start training</strong>
            <input type="date" name="pst" id="textfield6" class="form-control" placeholder="Planning to start training" required>
            </div>
            <div class="form-group">
            <textarea name="message" rows="3" id="textfield5" class="form-control bg-white" style="resize:none" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
                        <div><label> <span style="float:left; padding:0px 0px 0 0"><img src="captcha.php" align="absmiddle" style="border:1px solid #d9d9d9;" alt="captcha"></span>
             <input name="vercode" type="text" class="form-control  form-field" id="textfield6" style="width:120px;margin:0" placeholder="Enter Code" required=""></label></div>
                        </div>
            <div class="form-group" align="center">
            <input name="Submit" type="submit" class="top_cont btn btn-primary btn1" value="Submit">
            </div>
            </form>
            </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
        	<div class="color6 color7">
            <h2>News & Events</h2>
            </div>
            <div class="bg-3">
<ul id="demo3">
<marquee onMouseOver="this.stop();" onMouseOut="this.start();" scrolldelay="2" scrollamount="2" direction="up" height="400px">
<?php
for($i=0;$i<$total;$i++){
$id = ($res['oDATA'][$i]['id']);
$type = outText($res['oDATA'][$i]['type']);
$title = outText($res['oDATA'][$i]['title']);
$url = outText($res['oDATA'][$i]['url']);
$publish_date = outText($res['oDATA'][$i]['publish_date']);
$pdate=date("d.m.Y",strtotime($publish_date));
$link = ($res['oDATA'][$i]['link']);
$venue = ($res['oDATA'][$i]['venue']);
$file_name = ($res['oDATA'][$i]['file_name']); 
$new = $res['oDATA'][$i]['new'];
?>
<?php if($type == 2){?>
<li class="news-item"> 
<div class="desc_col">
<div class="news_content">
<p class="news_title"><a href="<?=$link?>"> <?=$pdate?> <?=$title?></a></p>
<?php if($new ==1){?><img alt="Environmental health & safety knowledge solution provider India"   src="img/new.gif"  border="0" align="absmiddle"/><?php }?>
</div>
</div>
</li>
<?php }?>
<?php if($type == 1){?>
<li class="news-item"> 
<div class="desc_col">
<div class="news_content">
<p class="news_title"><a href="<?=SITE_HOME?>news-files/<?=$file_name?>" class="button"><?=$pdate?> <?=$title?></a></p>
<?php if($new ==1){?><img alt="Environmental health & safety knowledge solution provider India"   src="img/new.gif"  border="0" align="absmiddle"/><?php }?>
</div>
</div>
</li>
<?php }?>
<?php if($type == 0){?>                                                        
<li class="news-item"> 
<div class="desc_col">
<div class="news_content">
<p class="news_title"><a href="news.php?news=<?php print $title;?>" class="button"> <?=$pdate?> <?=$title?></a></p>
<?php if($new ==1){?><img alt="Environmental health & safety knowledge solution provider India"   src="img/new.gif"  border="0" align="absmiddle"/><?php }?>
</div>
</div>
</li>
<?php }
}
?>
</marquee>
</ul>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
        	<div class="color6 color7 color9">
            <h2>Video Gallery</h2>
            </div>
            <div class="bg-3 img-gallery">
            <?php
                $sql="SELECT * FROM tbl_video ORDER BY id DESC LIMIT 1";
				$query=mysql_query($sql);
				while($vrow=mysql_fetch_array($query)){
				?>
                 <iframe width="100%" height="400" src="<?=$vrow['video_link'];?>" frameborder="0" allowfullscreen></iframe> 
                <?php
                }
		  		?>

            </div>
        </div>
      </div>
      </div>    
      <div class="our-attorney-area bg-clip3">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="section-title-area vh2">
                 <h2>Trainers</h2>
                 <p>Nviron conduct external training programs for engineers & managers in the field health, safety & environment at all industrial belts and state capitals of India. </p>
               </div>
            </div>
          </div>
          <div class="our-attorney">
              <?php
				  $i = 1;
				  $get_banner = $Dbqur->fetch_data("tbl_attorney","sort_order!=0","sort_order asc");
				  foreach($get_banner as $key){		
	            ?>
          
            <div class="single-attorney">
              <div class="attorney-picture">
                <a href="attorney.php?id=<?=$key['id'];?>"><img alt="Environmental health & safety knowledge solution provider India" src="images/logo_client/<?=$key['logo'];?>"></a>
                <div class="overlay">
                  <h2><a href="attorney.php?id=<?=$key['id'];?>">View More</a></h2>
                </div>
              </div>
              <div class="attorney-content">                
                <h3><a href="attorney.php?id=<?=$key['id'];?>"><?=$key['client_name'];?></a></h3>
                
              </div>
            </div>
           <?php
           $i++;
           } 
		  ?>
          </div>
          <div align="center"><a href="attorney-details.php" class="btn btn-primary btn1"><strong>View All</strong></a></div>
        </div>
      </div>
<div align="center" >
       <div class="angeled-path">
                <div class="v-paragraph vh2">
                <h2 align="center">Accredited By</h2>
                <div class="col-md-6 col-sm-6" align="center"><img alt="Environmental health & safety knowledge solution provider India" src="img/Startindia.png"></div>
                <div class="col-md-6 col-sm-6" align="center"><img alt="Environmental health & safety knowledge solution provider India" src="img/startodisha.png"></div>
                </div>
             </div>
        </div>      
      <?php 
	  	include("footer.php");
	  ?>	
    </body>
</html>
