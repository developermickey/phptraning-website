<?php
//school_add.php
$required = "<font color='#FF0000' size='1'>*</font>";
?>

<div class="content_header">
  <div class="heading flleft">Add New Category</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form action="PhotoAction.php" method="post" onsubmit="return validateCategory(this);" name="frm">
    <input type="hidden" name="act" value="addcategory" />
	<div id="validation_div" class="validation_error"></div>
	<div class="box01" style="width:600px;">
     <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
      <tr>
        <td align="left" class="label" width="120">Category Name <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_name" id="category_name" value="" size="70" onblur="fillURL(this.value,'category_url')"/></td>
      </tr>
      <tr>
        <td align="left" class="label">Category URL <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_url" id="category_url" value="" size="70" /></td>
      </tr>
      <tr>
        <td align="left" colspan="2">&nbsp;</td>
        <td align="left" valign="middle" height="40"><input name="submit" type="submit" value="Add Category" class="button" />
        </td>
      </tr>
    </table>
	</div>
  </form>
</div>
