<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
if ($_POST['stage'] == 2) {
    $date = date("Y-m-d", strtotime($_POST['dob']));
    if ($_FILES['img']['name'] != "") {
        $path2 = "../upload_image";
        $delpath = $path2 . "/" . $_POST['T2'];

        @unlink($delpath);

        $s1 = rand();
        $realname = $_FILES['img']['name'];
        $realname = $s1 . "_" . $realname;
        $dest = $path2 . "/" . $realname;
		if(($_FILES['img']['type'] != "image/jpeg") && ($_FILES['img']['type'] != "image/png") && ($_FILES['img']['type'] != "image/jpg") && ($_FILES['img']['type'] != "image/PNG") && ($_FILES['img']['type'] != "image/JPG") && ($_FILES['img']['type'] != "image/JPEG")){
			die("Sorry!!! Invalid Image Format Please Upload jpeg/png/jpg");
		}else{		
        move_uploaded_file($_FILES['img']['tmp_name'], $dest);
		}
        $img_name = trim($realname);
        $img = $img_name;
    } else {
        $img = trim($_POST['T2']);
    }
    $sql = "insert into  tbl_banner set 
		banner_name='" . str_replace("'", "&#39;", $_POST['txtname']) . "',          
		banner_image		=	'" . str_replace("'", "&#39;", $img) . "',
		banner_desc		=	'" . str_replace("'", "&#39;", $_POST['txadesc']) . "',
		banner_sequence='" . str_replace("'", "&#39;", $_POST['txtsequence']) . "'";

    // print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Added Successfully.";
    print "<script>";
    print "self.location = 'managebanner.php?msg=$msg';";
    print "</script>";
}


?>

<div class="content_header">
  <div class="heading flleft">Add New Banner</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
   <?php
	if ($res['id'] == "") {
		?>
		<input type="hidden" name="stage" value="2">
		<?php
	} else {
		?>
		<input type="hidden" name="stage" value="3">
		<input type="hidden" name="id" value="<?php print $res['id'] ?>">
		<?php
	}
	?>
    <input type="hidden" name="act" value="addfaculty">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
   
    <tr>
      <td align="left" class="label">Banner Name <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="txtname" value="<?=$fdata['faculty_designation']?>" size="50" /></td>
    </tr>
    
    <tr>
      <td align="left" class="label">Upload Image</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" value="<?=$fdata['faculty_photo']?>" />
       <input type="hidden" name="T2" value="<?php print $res['image']; ?>">
      </td>
      <tr>
      <td align="left" class="label">Description <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><textarea row="5" cols="50" id="txadesc" name="txadesc" ></textarea></td>
    </tr>
    </tr>
    <tr>
      <td align="left" class="label">Sequence</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="txtsequence" value="<?=$fdata['faculty_email']?>" size="5" placeholder="Like 1, 2, 3"/></td>
    </tr>
    <tr>
    <td colspan="3"><strong><em>Note:Please Upload the Image  of width="1349" Pixel and height="400" Pixel</em></strong></td>
    
    </tr>
	
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Add Banner" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>