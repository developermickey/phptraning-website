<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
$id=$_GET['id'];
$tquery=mysql_query("select * from tbl_welcome where id='$id'");
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
	$video_desc = mysql_real_escape_string($_POST['videodesc']);
	$video_link = mysql_real_escape_string($_POST['videolink']);
	$menu_page= mysql_real_escape_string($_POST['menu_page_id']);
	$date =date("Y-m-d");
	
	$sql="update tbl_welcome set
			video_title='$video_title',
			video_desc='$video_desc',
			video_link='$video_link',
			page_link='$menu_page',
			created_date='$date'
			where id='$id'";

    $rs = mysql_query($sql);
    $msg = "Record Updated Successfully.";
    print "<script>";
    print "self.location = 'welcom.php?msg=$msg';";
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
      <td align="left" class="label">Address</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="videotitle" value="<?php echo $trow['video_title']; ?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Telephone <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><textarea id="videodesc" name="videodesc" style="width:500px;height:200px;resize:none;"><?php echo $trow['video_desc']; ?></textarea></td>
    </tr>
    <tr>
      <td align="left" class="label">Email</td>
      <td align="center">:</td>
      <td align="left">
       <input type="text" name="videolink" value="<?php echo $trow['video_link'];?>" size="50" />
      </td>
    </tr>
    <tr>
          <td align="left" class="label">Select Page</td>
          <td align="center">:</td>
          <td align="left"><select name="menu_page_id">
              <option value="0">Select Page</option>
              <?php
	$page_res = $pageObj->getPageNames();
	for($i=0;$i<$page_res['NO_OF_ITEMS'];$i++) {
		$page_id = $page_res['oDATA'][$i]['page_id'];
		$page_name = stripslashes($page_res['oDATA'][$i]['page_name']);
		if($menu_page==$page_id) {
			echo '<option value="'.$page_id.'" selected="selected">'.$page_name.'</option>';
		}
		else {
			echo '<option value="'.$page_id.'">'.$page_name.'</option>';
		}		
	}
	?>      </select>
          </td>
        </tr>
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Update" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>