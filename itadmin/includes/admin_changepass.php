<?php
$id=$_REQUEST['id'];
$res = $adminObj->getAdminUserById($id);
echo $res['oDATA'][0]['admin_id'];
echo $res['oDATA'][0]['admin_user'];
$admin_id = md5($res['oDATA'][0]['admin_id']);
$admin_user = stripslashes($res['oDATA'][0]['admin_user']);
echo $admin_id;
echo $admin_user;
?>
<div class="content_header">
  <div class="heading flleft">Change Administrator Password</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
<div id="validation_div" class="validation_error" align="center"></div>
  <form name="frm" action="AdminAction.php" method="post" onsubmit="return changepass_valid();">
    <input type="hidden" name="act" value="changeadminpass" />
    <input type="hidden" name="id" value="<?=$admin_id?>" />
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td align="left" width="130" class="label">New Password </td>
          <td align="left" width="10">:</td>
          <td align="left"><input type="password" name="npass" size="20" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Confirm Password </td>
          <td align="left">:</td>
          <td align="left"><input type="password" name="cpass" size="20" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left"></td>
          <td align="left" ><input type="submit" name="submit" value="Update" class="button"/></td>
        </tr>
      </table>
    </div>
  </form>
</div>