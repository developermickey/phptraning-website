<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
if ($_POST['act'] == 'addclient') {
    $date = date("Y-m-d", strtotime($_POST['dob']));
    if ($_FILES['img']['name'] != "") {
        $path2 = "../images/logo_client/";
        
        $s1 = rand();
        $realname = $_FILES['img']['name'];
        $realname = $s1 . "_" . $realname;
        $dest = $path2 . "/" . $realname;
	  
	    if(($_FILES['img']['type'] != "image/jpeg") && ($_FILES['img']['type'] != "img/png") && ($_FILES['image']['type'] != "img/jpg") && ($_FILES['img']['type'] != "img/PNG") && ($_FILES['img']['type'] != "image/JPG") && ($_FILES['img']['type'] != "img/JPEG") && ($_FILES['img']['type'] != "image/png")){
			die("Sorry!!! Invalid Image Format");
		}else{
			 	  move_uploaded_file($_FILES['img']['tmp_name'], $dest);
			 } 
	  
      
        $img_name = trim($realname);
        $img = $img_name;
    } 
	//GET DATA
	

	
	$dt = date('Y-m-d');
	
    $sql = "INSERT INTO `tbl_affilation` SET `logo`='$img',`created_date`='$dt',`update_date`='$dt'";

    // print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Added Successfully.";
    print "<script>";
    print "self.location = 'manage_affiliation.php?msg=$msg';";
    print "</script>";
}
?>

<div class="content_header">
  <div class="heading flleft">Add New attorney</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
   
    <input type="hidden" name="act" value="addclient">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
   
    <tr>
      <td align="left" class="label">Upload Photo</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" id="img"/>
       
      </td>
      
    </tr>
    
    <tr>
    <td colspan="3">Note:Please Upload the Image  of width="200" Pixel and height="80" Pixel</td>
    
    </tr>
	
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Add affiliation" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>