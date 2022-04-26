<?php
$id = filter($_REQUEST['id']);
$res = $adminObj->getAdminUserById($id);
$admin_id = md5($res['oDATA'][0]['admin_id']);
$admin_user = outText($res['oDATA'][0]['admin_user']);
$admin_name = outText($res['oDATA'][0]['admin_name']);
$admin_email = outText($res['oDATA'][0]['admin_email']);
$admin_phone = outText($res['oDATA'][0]['admin_phone']);
$admin_type = outText($res['oDATA'][0]['admin_type']);
?>
<div class="content_header">
  <div class="heading flleft">Edit Administrator</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <div id="validation_div" class="validation_error"></div>
  <form name="frm" action="AdminAction.php" method="post" onsubmit="return editadmin_valid()">
    <input type="hidden" name="act" value="editadmin" />
    <input type="hidden" name="id" value="<?=$admin_id?>" />
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="100" align="left" class="label">Name</td>
          <td width="10" align="center">:</td>
          <td align="left"><input type="text" name="name" size="40" value="<?=$admin_name?>" /></td>
        </tr>
        <tr>
          <td align="left" class="label">User Name</td>
          <td align="center">:</td>
          <td align="left"><input type="text" name="uname" size="40" value="<?=$admin_user?>" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Email</td>
          <td align="center">:</td>
          <td align="left"><input type="text" name="email" size="40" value="<?=$admin_email?>" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Phone</td>
          <td align="center">:</td>
          <td align="left"><input type="text" name="phone" size="40" value="<?=$admin_phone?>" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Admin Type</td>
          <td align="center">:</td>
          <td align="left"><select name="admin_type">
              <option value="2" <?php if($admin_type==2) echo ' selected="selected"';?>>Admin</option>
            </select></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="submit" value="Update" class="button" /></td>
        </tr>
      </table>
    </div>
  </form>
</div>
