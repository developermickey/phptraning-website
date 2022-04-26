<script language="javascript">
function deleteMessage(u_id){
	if(confirm("Are you sure to delete this account?")){
		document.location.href="AdminAction.php?act=deleteadmin&id="+u_id;
	}
}
</script>

<div class="content_header">
  <div class="heading flleft">Admin Manager </div>
  <div class="heading flright"><a href="admin-manager.php?q=add">Add New Admin</a></div>
  <div class="clear"></div>
</div>
<div class="bodycontent">
  <?php
$res = $adminObj->getAdminUser();
$total = $res['NO_OF_ITEMS'];
if($total>0) {
?>
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid">
    <tr>
      <th width="30">S.N.</th>
      <th width="87">User Name</th>
      <th width="118">Name</th>
      <th width="105">Email</th>
      <th width="96">Phone</th>
      <th width="92">Admin Type</th>
      <th colspan="4">Actions</th>
    </tr>
    <?php			
for($i=0;$i<$total;$i++) { 
$admin_id = $res['oDATA'][$i]['admin_id'];
$admin_user = outText($res['oDATA'][$i]['admin_user']);
$admin_name = outText($res['oDATA'][$i]['admin_name']);
$admin_email = outText($res['oDATA'][$i]['admin_email']);
$admin_phone = outText($res['oDATA'][$i]['admin_phone']);
$admin_type = outText($res['oDATA'][$i]['admin_type']);
$status = outText($res['oDATA'][$i]['admin_status']);
if($admin_type==1) { $type="Superadmin"; } else { $type="Admin"; }
?>
    <tr>
      <td align="center"><?=($i+1)?></td>
      <td align="left"><?=$admin_user?></td>
      <td align="left"><?=$admin_name?></td>
      <td align="left"><a href="mailto:<?=$admin_email?>">
        <?=$admin_email?>
        </a></td>
      <td align="left"><?=$admin_phone?></td>
      <td align="center"><?=$type?></td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=edit&id=<?=md5($admin_id)?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td width="31" height="25" align="center"><?php if($status=="1") {  ?>
        <a href="AdminAction.php?act=disable&id=<?=$admin_id?>"><img src="images/enable.png" border="0" alt="Click to Disable" title="Disable"/></a>
        <?php
		} elseif ($status=="0") { ?>
        <a href="AdminAction.php?act=enable&id=<?=$admin_id?>"><img src="images/disable.png" border="0" alt="Enable" title="Click to Enable"/></a>
        <?php
		} ?>
      </td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=changepass&id=<?=md5($admin_id)?>"><img border="0" src="images/password.png" align="Change Password" title="Change Password" /></a></td>
      <td width="25" align="center"><a href="javascript:void(0)"><img border="0" src="images/delete.png" align="Delete" title="Delete" onClick="deleteMessage(<?=$admin_id?>)" /></a> </td>
    </tr>
    <?php } ?>
  </table>
  <?php } ?>
</div>
