<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/

if ($_POST['stage'] == 2) {
	if($_POST['type']=="Holiday"){
	$color_code="#FF0000";
	}
	else{
	$color_code="#A3D073";
	}
	$var = $_POST['event_frm_date']." "."10:00:00";
	$date=date("Y-m-d H:i:s", strtotime($var));
	$var1 = $_POST['event_to_date']." "."16:00:00";
	$date1=date("Y-m-d H:i:s", strtotime($var1));
    $sql = "insert into events set 
		from_date='$date',
		to_date='$date1',          
		event_title		='" . str_replace("'", "&#39;", $_POST['title']) . "',          
		description		=	'" . str_replace("'", "&#39;", $_POST['txadesc']) . "',
		event_type		=	'" . str_replace("'", "&#39;", $_POST['type']) . "',
		color_code		=	'$color_code',
		status		=	'1'";
		
		//hosted_by		=	'" . str_replace("'", "&#39;", $_POST['hosted_by']) . "'

    //print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Added Successfully.";
    print "<script>";
    print "self.location = 'calender.php?msg=$msg';";
    print "</script>";
}


?>

<div class="content_header">
  <div class="heading flleft">Add New Event for Calender</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="form1" method="post" action=""  onsubmit="return validate();">
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
      <td align="left" class="label">Event From Date</td>
      <td align="center">:</td>
      <td align="left"><input class="two" type="text" name="event_frm_date" value="" readonly=""/></td>
    </tr>
    <tr>
      <td align="left" class="label">Event To Date</td>
      <td align="center">:</td>
      <td align="left"><input class="two" type="text" name="event_to_date" value="" readonly=""/></td>
    </tr>
    <tr>
      <td align="left" class="label">Event Title</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="title" value="" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Description</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="txadesc" value="" size="50"/></td>
    </tr>
    <tr>
      <td align="left" class="label">Event Type</td>
      <td align="center">:</td>
      <td align="left">
      <select name="type">
      <option value="">Select One</option>
      <option value="Holiday">Holiday</option>
      <option value="Celebration">Celebration</option>
      </select>
      </td>
    </tr>
    <!--<tr>
      <td align="left" class="label">Hosted By</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="hosted_by" value="" size="50" /></td>
    </tr>-->
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Add Event" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>