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
	
	$client_name = mysql_real_escape_string($_REQUEST['client_name']);
	$txadesc = mysql_real_escape_string($_REQUEST['txadesc']);
	
	$dt = date('Y-m-d');
	
    $sql = "INSERT INTO `tbl_client` SET `client_name`='$client_name',`logo`='$img',`client_desc`='$txadesc',`created_date`='$dt',`update_date`='$dt'";

    // print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Added Successfully.";
    print "<script>";
    print "self.location = 'manage_client.php?msg=$msg';";
    print "</script>";
}
?>

<div class="content_header">
  <div class="heading flleft">Add New Client</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
   
    <input type="hidden" name="act" value="addclient">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
   	
    <tr>
      <td align="left" class="label">Client Name <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="client_name" size="50" /></td>
    </tr>
    
    <tr>
      <td align="left" class="label">Upload Logo</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" id="img"/>
       
      </td>
      <tr>
      <td align="left" class="label">Description <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><textarea row="5" cols="50" id="txadesc" name="txadesc" ></textarea></td>
    </tr>
    </tr>
    
    <tr>
    <td colspan="3">Note:Please Upload the Image  of width=150 Pixel and height=150 Pixel</td>
    
    </tr>
	
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Add Client" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>