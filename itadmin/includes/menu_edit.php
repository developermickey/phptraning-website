<?php
//menu_edit.php
$required = "<font color='#FF0000' size='1'>*</font>";
$menu_id = isset($_GET['mid'])?$_GET['mid']:0;
$med_res = $menuObj->getMenuDetails($menu_id);
if($med_res['NO_OF_ITEMS']>0) {
	$menu_id = (int)$med_res['oDATA'][0]['menu_id'];
	$menu_pid = outText($med_res['oDATA'][0]['menu_pid']);
	$menu_name = outText($med_res['oDATA'][0]['menu_name']);
	$menu_position = (int)($med_res['oDATA'][0]['menu_position']);
	$menu_page = outText($med_res['oDATA'][0]['menu_page']);
	$menu_target = outText($med_res['oDATA'][0]['menu_target']);
	if((int)$menu_page == 0) {
		$menu_link = $menu_page;
	}
}
else {
	$menu_pid = $menuObj->getParentMenuID($menu_id);
}
?>

<div class="content_header">
  <div class="heading flleft"> Edit Menu <u><i>
    <?=$menu_name?>
    </i></u> </div>
  <div class="heading flright"> <a href="<?=$_curpage?>?pid=<?=$menu_pid?>" class="heading flleft">BACK</a></div>
<div class="clear"></div>
</div>
<div class="bodycontent">
  <form action="MenuAction.php" method="post" name="addmenufrm" onsubmit="return menu_valid();">
    <input type="hidden" name="act" value="updmenu" />
    <input type="hidden" name="menu_id" value="<?=$menu_id?>" />
    <input type="hidden" name="menu_pid" value="<?=$menu_pid?>" />
    <div id="validation_div" class="validation_error"></div>
    <div class="box01">
    <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
      <tr>
        <td align="left" class="label">Menu Name <?=$required?></td>
        <td><input type="text" name="menu_name" value="<?=$menu_name?>" size="40" onblur="fillURL(this.value,'menu_url')"/></td>
      </tr> 
      <tr>
        <td align="left" class="label">Menu Postion <?=$required?></td>
        <td><input type="text" name="menu_position" value="<?=$menu_position?>" size="3"/></td>
      </tr>
      <tr>
        <td align="left" height="3"></td>
      </tr>
      <tr>
        <td align="left" class="label">Select Page</td>
        <td><select name="menu_page_id">
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
        <td><input type="text" name="menu_link" value="<?=$menu_link?>" size="48"/></td>
      </tr>
	   <tr>
          <td align="left" class="label">Target</td>
          <td><select name="menu_target">
              <option value="">Same Page</option>
			  <option value="_blank" <?php if($menu_target=="_blank") echo ' selected="selected"';?>>New Page</option>
			  </select></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="submit" type="submit" value="Update Menu" class="button" /></td>
      </tr>
    </table>
	</div>
  </form>
</div>
