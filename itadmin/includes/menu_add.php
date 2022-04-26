<?php
//menu_add.php
$required = "<font color='#FF0000' size='1'>*</font>";
$menu_pid = isset($_GET['pid'])?$_GET['pid']:0;
$back_id = $menuObj->getParentMenuID($menu_pid);
if($menu_pid!=0) {
	$heading = "Add Submenu under <u><i>". $menuObj->getMenuName($menu_pid). "</i></u>";
}
else {
	$heading = "Add New Menu";
}
?>
<div class="content_header">
  <div class="heading flleft">
    <?=$heading?>
  </div>
  <div class="heading flright"> <a href="<?=$_curpage?>?pid=<?=$back_id?>" class="heading flleft">BACK</a></div>
<div class="clear"></div>
</div>
<div class="bodycontent">
  <form action="MenuAction.php" method="post" name="addmenufrm" onsubmit="return menu_valid();">
    <input type="hidden" name="act" value="addmenu" />
    <input type="hidden" name="menu_pid" value="<?=$menu_pid?>" />
    <div id="validation_div" class="validation_error"></div>
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td align="left" class="label">Menu Name <?=$required?></td>
          <td><input type="text" name="menu_name" value="" size="40" onblur="fillURL(this.value,'menu_url')"/></td>
        </tr>
        <tr>
          <td align="left" class="label">Menu Postion <?=$required?></td>
          <td><input type="text" name="menu_position" value="" size="3"/></td>
        </tr>
		<tr>
          <td align="left" height="3"></td>
        </tr>
        <tr>
          <td align="left" class="label">Select Page</td>
          <td align="left"><select name="menu_page_id">
              <option value="0">Select Page</option>
              <?php
	$page_res = $pageObj->getPageNames();
	for($i=0;$i<$page_res['NO_OF_ITEMS'];$i++) {
		$page_id = $page_res['oDATA'][$i]['page_id'];
		$page_name = stripslashes($page_res['oDATA'][$i]['page_name']);
		echo '<option value="'.$page_id.'">'.$page_name.'</option>';
	}
	?>
            </select>
          </td>
        </tr>
		<tr>
          <td>&nbsp;</td>
          <td>OR</td>
        </tr>
        <tr>
          <td align="left" class="label">Enter Link</td>
          <td><input type="text" name="menu_link" value="" size="48"/></td>
        </tr>		
        <tr>
          <td align="left" class="label">Target</td>
          <td><select name="menu_target">
              <option value="">Same Page</option>
			  <option value="_blank">New Page</option>
			  </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="50" valign="middle"><input name="submit" type="submit" value="Add Menu" class="button"/></td>
        </tr>
      </table>
    </div>
  </form>
</div>
