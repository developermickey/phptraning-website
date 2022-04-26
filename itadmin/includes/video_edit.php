<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
$id=$_GET['id'];
$tquery=mysql_query("select * from tbl_video where id='$id'");
$trow=mysql_fetch_array($tquery);
if ($_POST['stage'] == 3) {

    /*if ($_FILES['img']['name'] != "") {
        $path2 = "../Logo";
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
    }*/
	$video_title = mysql_real_escape_string($_POST['videotitle']);
	$video_link = mysql_real_escape_string($_POST['videolink']);
	$date =date("Y-m-d");
	
	$sql="update tbl_video set
			video_title='$video_title',
			video_link='$video_link',
			created_date='$date'
			where id='$id'";

    $rs = mysql_query($sql);
    $msg = "Record Updated Successfully.";
    print "<script>";
    print "self.location = 'video.php?msg=$msg';";
    print "</script>";
}
?>

<div class="content_header">
  <div class="heading flleft">Edit Video</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
 <form  name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
   <?php
	if ($trow['id'] == "") {
		?>
		<input type="hidden" name="stage" value="2">
		<?php
	} else {
		?>
		<input type="hidden" name="stage" value="3">
		<input type="hidden" name="id" value="<?php print $trow['id'] ?>">
		<?php
	}
	?>
    <input type="hidden" name="act" value="editvideo">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
    <tr>
      <td align="left" class="label">Videeo Title</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="videotitle" value="<?php echo $trow['video_title']; ?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Video Link</td>
      <td align="center">:</td>
      <td align="left">
       <input type="text" name="videolink" value="<?php echo $trow['video_link'];?>" placeholder="Paste the src code only = https://www.youtube.com/embed/7tjyoZZi5wc" size="50" />
      </td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Update" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>