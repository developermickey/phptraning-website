<?php
//faculty_add.php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();
?>

<div class="content_header">
  <div class="heading flleft">Add New Faculty</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="frm" method="post" action="StaffAction.php" enctype="multipart/form-data" onsubmit="return faculty_valid();">
    <input type="hidden" name="act" value="addfaculty">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
    <tr>
      <td align="left" class="label" width="150">Faculty Type <?=$required?></td>
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
	  </select> <input type="text" name="faculty_name" value="<?=$fdata['faculty_name']?>" size="39" onblur="fillURL(this.value,'faculty_url')"/></td>
    </tr>
    <tr>
      <td align="left" class="label">URL <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="faculty_url" id="faculty_url" value="<?=$fdata['faculty_url']?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Designation <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="faculty_designation" value="<?=$fdata['faculty_designation']?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Email</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="faculty_email" value="<?=$fdata['faculty_email']?>" size="50" /></td>
    </tr>
    <tr>
      <td align="left" class="label">Upload Image</td>
      <td align="center">:</td>
      <td align="left"><input type="file" name="faculty_photo" value="<?=$fdata['faculty_photo']?>" /></td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Qualification <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $fdata['faculty_qualification'];
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
		$cntdesc = $fdata['faculty_experience'];
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
		$cntdesc = $fdata['faculty_membership'];
		$ctrl_name = 'faculty_membership';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "350px";			$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Specialization <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $fdata['faculty_specialization'];
		$ctrl_name = 'faculty_specialization';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "300px";			$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
	<tr>
      <td align="left" class="label" colspan="3">Awards <br />
	  <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $fdata['faculty_awards'];
		$ctrl_name = 'faculty_awards';
		$sBasePath = 'includes/fckeditor/';		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "300px";		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>	</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Add Faculty" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>