<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
$id=$_GET['id'];
$bquery=mysql_query("select * from tbl_bestseller where id='$id'");
$brow=mysql_fetch_array($bquery);
if ($_POST['stage'] == 3) {
//print "<pre>";print_r ($_POST); print "</pre>";exit();
    $date = date("Y-m-d", strtotime($_POST['dob']));
    if ($_FILES['img']['name'] != "") {
        $path2 = "../best_seller";
        $delpath = $path2 . "/" . $_POST['T2'];

        @unlink($delpath);

        $s1 = rand();
        $realname = $_FILES['img']['name'];
        $realname = $s1 . "_" . $realname;
        $dest = $path2 . "/" . $realname;
        move_uploaded_file($_FILES['img']['tmp_name'], $dest);
        $img_name = trim($realname);
        $img = $img_name;
    } else {
        $img = trim($_POST['T2']);
    }
	$title = mysql_real_escape_string($_POST['txttitle']);
	$date = date("Y-m-d");
	
	$sql="update tbl_bestseller set
			title='$title',
			image='$img'
			where id='$id'";
    
    // print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Updated Successfully.";
    print "<script>";
    print "self.location = 'bestseller.php?msg=$msg';";
    print "</script>";
}


?>

<div class="content_header">
  <div class="heading flleft">Edit Bestseller</div>
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
      <td align="left" class="label">Title</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="txttitle" value="<?php echo $brow['title'];?>" size="50" /></td>
    </tr>
    
    <tr>
      <td align="left" class="label">Upload Image</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" value="<?php echo $brow['image']?>" />
       <input type="hidden" name="T2" value="<?php echo $brow['image']?>">
      <span><?php echo "<img alt='not found' height='70' width='50' src=../best_seller/" . $brow['image'] . ">" ?> </span>
      </td>
      
    <tr>
    <td colspan="3">Note:Please Upload the Image  of width=284 Pixel and height=456 Pixel</td>
    
    </tr>
	
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Update Bestseller" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>