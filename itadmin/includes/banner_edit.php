<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
$id=$_GET['id'];
$bquery=mysql_query("select * from tbl_banner where id='$id'");
$brow=mysql_fetch_array($bquery);
if ($_POST['stage'] == 3) {
//print "<pre>";print_r ($_POST); print "</pre>";exit();
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
	$banner_name = mysql_real_escape_string($_POST['txtname']);
	$banner_desc = mysql_real_escape_string($_POST['txadesc']);
	$banner_sequence = mysql_real_escape_string($_POST['txtsequence']);
	
	$sql="update tbl_banner set
			banner_name='$banner_name',
			banner_image='$img',
			banner_desc='$banner_desc',
			banner_sequence='$banner_sequence'
			where id='$id'";
    
     //print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Updated Successfully.";
    print "<script>";
    print "self.location = 'managebanner.php?msg=$msg';";
    print "</script>";
}


?>

<div class="content_header">
  <div class="heading flleft">Edit Banner</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
   <?php
	if ($brow['id'] == "") {
		?>
		<input type="hidden" name="stage" value="2">
		<?php
	} else {
		?>
		<input type="hidden" name="stage" value="3">
		<input type="hidden" name="id" value="<?php print $brow['id'] ?>">
		<?php
	}
	?>
    <input type="hidden" name="act" value="addfaculty">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
   
    <tr>
      <td align="left" class="label">Banner Name</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="txtname" value="<?php echo $brow['banner_name'];?>" size="50" /></td>
    </tr>
    
    <tr>
      <td align="left" class="label">Upload Image</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" value="<?php echo $brow['banner_image']?>" />
       <input type="hidden" name="T2" value="<?php echo $brow['banner_image']?>">
      <span><?php echo "<img alt='not found' height='50' width='80' src=../upload_image/" . $brow['banner_image'] . ">" ?> </span>
      </td>
      <tr>
      <td align="left" class="label">Description</td>
      <td align="center">:</td>
      <td align="left"><textarea row="5" cols="50" id="txadesc" name="txadesc" ><?php echo $brow['banner_desc']; ?></textarea></td>
    </tr>
    </tr>
    <tr>
      <td align="left" class="label">Sequence</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="txtsequence" value="<?php echo $brow['banner_sequence']; ?>" size="5" placeholder="Like 1, 2, 3"/></td>
    </tr>
    <tr>
    <td colspan="3"><strong><em>Note:Please Upload the Image  of width="1349" Pixel and height="400" Pixel</em></strong></td>
    
    </tr>
	
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Update Banner" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>