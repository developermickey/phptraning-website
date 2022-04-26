<div class="content_header">
  <div class="heading flleft">Add New Administrator</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form name="frm" action="AdminAction.php" method="post" onsubmit="return addadmin_valid()">
    <input type="hidden" name="act" value="addadmin" />
    <div id="validation_div" class="validation_error" align="center"></div>
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="117" align="left" class="label">Name</td>
          <td width="8" align="center">:</td>
          <td align="left"><input type="text" name="name" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">User Name</td>
          <td align="center" class="label">:</td>
          <td><input type="text" name="uname" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Password</td>
          <td align="center">:</td>
          <td><input type="password" name="pass" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Confirm Password</td>
          <td align="center">:</td>
          <td><input type="password" name="repass" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Email</td>
          <td align="center">:</td>
          <td><input type="text" name="email" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Phone</td>
          <td align="center">:</td>
          <td><input type="text" name="phone" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Admin Type</td>
          <td align="center">:</td>
          <td><select name="admin_type">
              <option value="2">Admin</option>
            </select></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="submit" value="Submit" class="button" /></td>
        </tr>
      </table>
    </div>
  </form>
</div>
