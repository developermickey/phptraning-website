<?php $admin_type = $_SESSION[SES]['admin']['admin_type'];?>
<div class="style2">Links</div>
<div class="submenu" id="sub1">
	<div><a href="index.php">Home</a></div>
	<div><a href="my-account.php">My Account</a></div>
	<?php if($admin_type==1){?><div><a href="admin-manager.php">Admin Manager</a></div><?php }?>
	
	<div><a href="page-management.php">Page Management</a></div>
	<div><a href="menu-management.php">Menu Management</a></div>
    <div><a href="managebanner.php">Manage Banner</a></div>	
	<!--<div><a href="staff-management.php">Staff Management</a></div>	-->
	<!--<div><a href="notification.php">Notice Board</a></div>-->
	<div><a href="news.php">Latest News</a></div>
<div><a href="announcement.php">Manage Upcoming Course</a></div>
	<!--<div><a href="announcement.php">Upcoming Events</a></div>-->
	<div><a href="photo-gallery.php">Photo Gallery</a></div>
    <div><a href="video.php">Video Gallery</a></div>
<!--    <div><a href="result-management.php">Adv. Diploma Result</a></div>		
    <div><a href="result-managementpg.php">PG. Diploma Result</a></div>	-->
    <!--<div><a href="certificate-management.php">Certificate Varification</a></div>-->
 <!-- <div><a href="testimonial.php">Manage Services</a></div>-->    		
<!--	<div><a href="calender.php">Event Calender</a></div>-->
<!--    <div><a href="thought.php">Thought of the Day</a></div>
    <div><a href="upload_syllabus.php">Upload Syllabus</a></div>-->
    <div><a href="manage_client.php">Manage Testimonial</a></div> 
    <div><a href="manage_Attorney.php">Manage Trainer</a></div> 
    <div><a href="manage_affiliation.php">Manage Clients</a></div>
    <div><a href="course-manager.php">Manage Course</a></div>
<!--<div><a href="managepaper.php">Manage Case Study</a></div> -->   
	</div>
<script type="text/javascript">
var file, n;
file = window.location.pathname;
n = file.lastIndexOf('/');
if (n >= 0) {
    file = file.substring(n + 1);
}
var flag=0;
$('.submenu').children('div').each(function () {
    if($(this).children('a').attr("href")==file) {		
		$(this).addClass("active");
		flag=1;
	}
});
if(file=="") {
	$('.submenu div:first-child(1)').addClass("active");
}
</script>