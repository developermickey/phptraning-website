<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
if ($_POST['action'] == "add") {
    $created_date = date("Y-m-d");
    $updated_date = date("Y-m-d");
    $search_yes_record = mysql_query("select * from tbl_notice where status='yes'");
    if (mysql_num_rows($search_yes_record) > 0) {
        $update_query = mysql_query("update tbl_notice set status='no' , updated_date='$updated_date' where status='yes'");
    }
	$notice_content = mysql_real_escape_string($_POST['txadesc']);
    mysql_query("INSERT INTO tbl_notice (notice, created_date,status) VALUES ('$notice_content', '$created_date','yes')") or die('insert failed ' . mysql_error());
    $msg = "Record Updated Succesfully";
    print "<script>";
    print "self.location = 'notice.php?strmsg=$msg';";
    print "</script>";
    exit;
}
$brow = mysql_fetch_assoc(mysql_query("select * from tbl_notice where status='yes'"));
?>
<div class="content_header">
  <div class="heading flleft">Manage Notice</div>
</div>

<div class="bodycontent">
 <?php
    if($_GET['msg']!=''){
    ?>
    <div style="text-align:center; color: red;"><?php echo $_GET['msg'];?></div>
  <?php } ?>
  <form  name="form1" method="post" action="" onsubmit="return validate();">
  <input type="hidden" name="action" value="add" />

	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
      <tr>
      <td align="left" class="label">Notice Content</td>
      <td align="center">:</td>
      <td align="left"><textarea row="15" cols="50" id="txadesc" name="txadesc" ><?php echo $brow['notice']; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Update Notice" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>