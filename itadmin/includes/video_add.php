<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
if ($_POST['stage'] == 2) {
    $date = date("Y-m-d", strtotime($_POST['dob']));
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
    $sql = "insert into  tbl_video set 
		video_title = '" . str_replace("'", "&#39;", $_POST['videotitle']) . "',
		video_desc = '" . str_replace("'", "&#39;", $_POST['videodesc']) . "',           
		video_link =	'" . str_replace("'", "&#39;", $_POST['videolink']) . "',      
		created_date='" . date("Y-m-d") . "'";

    //print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Added Successfully.";
    print "<script>";
    print "self.location = 'video.php?msg=$msg';";
    print "</script>";
}


?>

<div class="content_header">
  <div class="heading flleft">Add New Video</div>
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
    <input type="hidden" name="act" value="addvideo">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
   
    <tr>
      <td width="14%" align="left" class="label">Video Title        <?=$required?></td>
      <td width="1%" align="center">:</td>
      <td width="85%" align="left"><input type="text" name="videotitle" value="<?=$fdata['logo_name']?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Description <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><textarea id="videodesc" name="videodesc" style="width:500px;height:200px;resize:none;"></textarea></td>
    </tr>
    <tr>
      <td align="left" class="label">Video Link</td>
      <td align="center">:</td>
      <td align="left">
      <input type="text" name="videolink" value="<?=$fdata['logo_name']?>" placeholder="Paste the src code only = https://www.youtube.com/embed/7tjyoZZi5wc" size="50" />
      </td>
      </tr>
      <tr>
      <td colspan="3">Note: only youtube links are allowed</td>
      </tr>
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Add Video" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>