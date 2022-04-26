<?php
//page_edit.php
$required = "<font color='#FF0000' size='1'>*</font>";
$id = isset($_GET['id'])?$_GET['id']:0;
$res = $phoObj->getCategoryById($id);
if($res['NO_OF_ITEMS']>0) {
	$id = $res['oDATA'][0]['category_id'];
	$category_name = outText($res['oDATA'][0]['category_name']);
	$category_url = outText($res['oDATA'][0]['category_url']);
}
?>

<div class="content_header">
  <div class="heading flleft">Update Category</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form action="PhotoAction.php" method="post" onsubmit="return validateCategory(this);" name="frm">
    <input type="hidden" name="act" value="editcategory" />
	 <input type="hidden" name="id" value="<?=$id?>" />
	<div id="validation_div" class="validation_error"></div>
	<div class="box01" style="width:600px;">
     <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
      <tr>
        <td align="left" class="label" width="120">Category Name <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_name" id="category_name" value="<?=$category_name?>" size="70" onblur="fillURL(this.value,'category_url')"/></td>
      </tr>
      <tr>
        <td align="left" class="label">Category URL <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_url" id="category_url" value="<?=$category_url?>" size="70" /></td>
      </tr>
      <tr>
        <td align="left" colspan="2">&nbsp;</td>
        <td align="left" valign="middle" height="40"><input name="submit" type="submit" value="Update Category" class="button" />
        </td>
      </tr>
    </table>
	</div>
  </form>
</div>

