<?php
$required = "<font color='#FF0000' size='1'>*</font>";
echo "Session Value :". $_SESSION[SES]['admin']['admin_id'];
$admin_id=md5($_SESSION[SES]['admin']['admin_id']);
echo "Admin Id:".$admin_id;

$res = $adminObj->getAdminUserById($admin_id);
$admin_user = outText($res['oDATA'][0]['admin_user']);
$admin_name = outText($res['oDATA'][0]['admin_name']);
$admin_email = outText($res['oDATA'][0]['admin_email']);
$admin_phone = outText($res['oDATA'][0]['admin_phone']);
?>

<div class="content_header">
  <div class="heading fleft">Admin Profile</div>
  <div class="heading fright"></div>
</div>
<div class="bodycontent">
<div>&nbsp;</div>
<div id="validation_div" class="validation_error" align="center"></div>
  <div style="float:left;width:350px;border: solid 1px #CCCCCC;">
    <div style="background: #00B3DE;color:#FFFFFF;padding:5px;">Admin Profile</div>
    <form action="AdminAction.php" method="post"  onsubmit = "return validProfile(this)">
      <input type="hidden" name="act" value="changeadminprofile" />
      <input type="hidden" name="admin_id" value="<?=$admin_id?>" />
      <table width="100%" border="0" cellpadding="3" cellspacing="0">
        <tr>
          <td class="label" align="left" width="100">Username
            <?=$required?></td>
          <td width="211"><input type="text" name="admin_user" value="<?=$admin_user?>" size="30" class="input_box" /></td>
        </tr>
        <tr>
          <td class="label">Name
            <?=$required?></td>
          <td width="211"><input type="text" name="admin_name" value="<?=$admin_name?>" size="30" class="input_box" /></td>
        </tr>
        <tr>
          <td class="label">Email
            <?=$required?></td>
          <td><input type="text" name="admin_email" value="<?=$admin_email?>" size="30" class="input_box" /></td>
        </tr>
		<tr>
          <td align="left" class="label">Phone</td>
          <td align="left"><input type="text" name="phone" size="30" value="<?=$admin_phone?>" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" value="Submit" class="button"/>
          </td>
        </tr>
      </table>
    </form>
  </div>
  <div style="margin-left:10px; float:left;width:370px;border: solid 1px #CCCCCC;">
    <div style="background: #00B3DE;color:#FFFFFF;padding:5px;">Change Password</div>
    <form action="AdminAction.php" method="post"  onsubmit = "return changepass_valid()" name="frm">
      <input type="hidden" name="act" value="changepass" />
      <input type="hidden" name="id" value="<?=$admin_id?>" />
      <table width="100%" border="0" cellpadding="3" cellspacing="0">        
        <tr>
          <td class="label">New Password
            <?=$required?></td>
          <td><input type="password" name="npass" size="20" /></td>
        </tr>
        <tr>
          <td class="label">Confirm Password
            <?=$required?></td>
          <td><input type="password" name="cpass" size="20" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" value="Submit" class="button"/></td>
        </tr>
      </table>
    </form>
  </div>
</div>
