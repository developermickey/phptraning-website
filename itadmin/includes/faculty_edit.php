<?php
//school_add.php
$required = "<font color='#FF0000' size='1'>*</font>";
if(isset($_SESSION[SES]['fdata'])) {
	$fdata = $_SESSION[SES]['fdata'];
	extract($fdata);
	unset($_SESSION[SES]['fdata']);
}
else {
	$fdata_res = array();
}
$id = $_REQUEST['id'];
$res = $fObj->getFacultyById($id); 
$total = $res['NO_OF_ITEMS'];
$faculty_id = (int)($res['oDATA'][0]['faculty_id']);
$faculty_type = outText($res['oDATA'][0]['faculty_type']);
$faculty_salutation = outText($res['oDATA'][0]['faculty_salutation']);
$faculty_name = outText($res['oDATA'][0]['faculty_name']);
$faculty_url = outText($res['oDATA'][0]['faculty_url']);
$faculty_photo = outText($res['oDATA'][0]['faculty_photo']);
$faculty_designation = outText($res['oDATA'][0]['faculty_designation']);
$faculty_email = outText($res['oDATA'][0]['faculty_email']);
$faculty_qualification = outText($res['oDATA'][0]['faculty_qualification']);
$faculty_experience = outText($res['oDATA'][0]['faculty_experience']);
$faculty_membership = outText($res['oDATA'][0]['faculty_membership']);
$faculty_specialization = outText($res['oDATA'][0]['faculty_specialization']);
$faculty_awards = outText($res['oDATA'][0]['faculty_awards']);
?>

<div class="content_header">
  <div class="heading flleft">Update Profile of <?=$faculty_name?></div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="frm" method="post" action="StaffAction.php" enctype="multipart/form-data" onsubmit="return faculty_valid();">
    <input type="hidden" name="act" value="editfaculty">
	 <input type="hidden" name="faculty_id" value="<?=$faculty_id?>">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
    <tr>
      <td align="left" class="label" width="150">Salutation <?=$required?></td>
      <td width="10" align="center">:</td>
      <td align="left"><select name="faculty_type">
	  <option value="academic" <?php if($faculty_type=="academic") echo '  selected="selected"';?>>ACADEMIC</option>
	  <option value="administrative" <?php if($faculty_type=="administrative") echo '  selected="selected"';?>>ADMINISTRATIVE STAFF</option>
	  <option value="supporting" <?php if($faculty_type=="supporting") echo '  selected="selected"';?>>SUPPORTING STAFF</option>
	  </select></td>
    </tr>
	<tr>
      <td align="left" class="label" width="150">Name <?=$required?></td>
      <td width="10" align="center">:</td>
      <td align="left"><select name="faculty_salutation">
	  <option value="Mr." <?php if($faculty_salutation=="Mr.") echo '  selected="selected"';?>>Mr.</option>
	  <option value="Ms." <?php if($faculty_salutation=="Ms.") echo '  selected="selected"';?>>Ms.</option>
	  <option value="Er." <?php if($faculty_salutation=="Prof.") echo '  selected="selected"';?>>Prof.</option>
	  <option value="Dr." <?php if($faculty_salutation=="Dr.") echo '  selected="selected"';?>>Dr.</option>
	  </select> <input type="text" name="faculty_name" value="<?=$faculty_name?>" size="39" onblur="fillURL(this.value,'faculty_url')"/></td>
    </tr>
    <tr>
      <td align="left" class="label">URL <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="faculty_url" id="faculty_url" value="<?=$faculty_url?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Designation <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="faculty_designation" value="<?=$faculty_designation?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Email</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="faculty_email" value="<?=$faculty_email?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Upload Image</td>
      <td align="center">:</td>
      <td align="left"><input type="file" name="faculty_photo" value="<?=$faculty_photo?>" /></td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Qualification <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $faculty_qualification;
		$ctrl_name = 'faculty_qualification';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "250px";		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Experience <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $faculty_experience;
		$ctrl_name = 'faculty_experience';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "300px";		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Membership <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $faculty_membership;
		$ctrl_name = 'faculty_membership';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "350px";		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Specialization <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $faculty_specialization;
		$ctrl_name = 'faculty_specialization';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "300px";		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Awards <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $faculty_awards;
		$ctrl_name = 'faculty_awards';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "300px";		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Update Faculty" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>