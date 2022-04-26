<div class="client-logo-area bg-clip4">
        <div class="container">
        <div class="section-title-area vh2">
                      <h2>Happy Clients</h2>
                      <p>For many satisfied clients we have developed customized training's and workshop.</p>
                      </div>
          <div class="client-logo">
          <?php
				  $i = 1;
				  $get_banner = $Dbqur->fetch_data("tbl_affilation","","id asc");
				  foreach($get_banner as $key){		
	            ?>
            <div class="single-logo">
              <a href="#"><img src="images/logo_client/<?=$key['logo'];?>" alt="NVIRON Training Centre Training and knowledge solution"></a>
            </div>
             <?php
           $i++;
           } 
		  ?>
          </div>
        </div>
      </div>
<footer>
        <div class="footer-top-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer footer-one">
                  <h2>Navigation</h2>
                  <div>
                  <ul>
                  <li><a></a></li>
                  </ul>
                  </div>             
                  <div class="social-media">
                    <ul>
                      <li><a href="https://www.facebook.com/pages/NVIRON/362045860622202" target="_blank"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="https://www.linkedin.com/company/nviron-consulting-pvt-ltd/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="https://api.whatsapp.com/send?phone=918800128028" target="_blank"><i class="fa fa-whatsapp"></i></a></li> 
                       <li><a href="https://www.youtube.com/channel/UCRxDEqm-acnI6GDFXWzfWIQ" target="_blank"><i class="fa fa-youtube-play"></i></a></li>                
                    </ul>
                    <ul>
                        <li style="border:0;"><a href="https://www.nviron.in/sitemap.php" style="font-size: 13px; padding: 0; padding-top: 15px; color: #fff; text-decoration:none;"> SITEMAP </a></li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer footer-three">
                  <h2>Keep in Touch</h2>
                  <ul>
                   
                    <li> <strong>Registered Office</strong><span style="display:block"></span> 

Plot No:1610, Mahanadi Vihar<span style="display:block"></span> 
Nayabazar, cuttack-753004<span style="display:block"></span> 
Odisha ,india<span style="display:block"></span> 
Ph:-+91-8594998167<span style="display:block"></span> 
Mail:-<a href="mailto:arpit@nviron.in">arpit@nviron.in</a>
 </li>
                    <li><strong>Corporate Office</strong><span style="display:block"></span> 
Gayatri nivas, 1st floor<span style="display:block"></span> 
 Plot no-739/8762<span style="display:block"></span> 
 Sikharpur, Nandikula sahi<span style="display:block"></span> 
 Odisha,India<span style="display:block"></span> 
 Telifax:-06712970728<span style="display:block"></span> 
 Ph:- +91-9776763500<span style="display:block"></span> 
 Mail-<a href="mailto:anupam@nviron.in">anupam@nviron.in</a>
</li>
                    <li>E-Mail: training@nviron.in</li>
                    <li>CIN: U74999OR2017PTC026279</li>
                  </ul>                  
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer footer-two">
                  <h2>Social Status</h2>
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FNVIRON%2F362045860622202&tabs=timeline&width=262&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>                  
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <div class="footer footer-four">
                  <h2>Find us </h2>
                   <div>
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14951.602886237706!2d85.9115385!3d20.4692704!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa4a8129ffd35633c!2sNviron%20Consulting%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1580299613705!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                   </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-buttom-area">
          <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="footer-buttom">
                    <div class="scrollup"><a href="#"><i class="fa fa-chevron-up"></i></a></div>
                   <p class="col-md-6 pull-left"><script>var d=new Date();document.write(d.getFullYear());</script>  Nviron © All Rights Reserved</p>
                   <p class="col-md-6 pull-right" style="text-align:right">Powered By <a href="https://www.adityahosting.com" style="font-size:18px;color:#00CCFF;" target="_blank">AH</a></p>
                 </div>
               </div>
            </div>
          </div>
        </div>
      </footer>
      
 <script src="js/vendor/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery-price-slider.js"></script>		
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/plugins.js"></script>       
        <script src="custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="custom-slider/home.js" type="text/javascript"></script>
        <script src="js/main.js"></script>      
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b6a9ca4df040c3e9e0c6508/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script—>