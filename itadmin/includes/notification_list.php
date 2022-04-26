<script language="javascript">
function deleteMessage(u_id){
	if(confirm("Are you sure to delete this ?")){
		document.location.href="NotificationAction.php?act=del&id="+u_id;
	}
}
</script>
 <?php
$total_page = $noticeObj->getTotalPages(); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['notice-board']['orderby'])?$_SESSION[SES]['notice-board']['orderby']:"id";
$order = isset($_SESSION[SES]['notice-board']['order'])?$_SESSION[SES]['notice-board']['order']:"desc";
$res = $noticeObj->getAllNotices($page*PAGE_LIMIT,$orderby, $order); 
$total = $res['NO_OF_ITEMS'];
?>
<div class="content_header">
  <div class="heading flleft">Notice Board</div>
  <div class="heading flright"><a href="notification.php?q=add">Add New Notice</a></div>
  <div class="flright"><select name="page" onchange="document.location.href='notification.php?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select>&nbsp;|&nbsp;</div>
  <div class="clear"></div>
</div>
<div class="bodycontent">
<?php if($total>0) {?>
<form action="NotificationAction.php" method="post" >
<input type="hidden" name="act" value="sort_order" />
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid">
    <tr>
      <th width="30">S.N.</th>
      <th width="87" class="sort" onclick="sortdata('publish_date')">Publish Date</th>
      <th width="118" class="sort" onclick="sortdata('title')">Title</th>
      <th colspan="3">Actions</th>
	   <th width="20">New Blinkings</th>
	   <th width="20">Sort Order</th>
    </tr>
    <?php			
for($i=0;$i<$total;$i++) { 
$id = $res['oDATA'][$i]['id'];
$publish_date = outText($res['oDATA'][$i]['publish_date']);
$title = outText($res['oDATA'][$i]['title']);
$status = outText($res['oDATA'][$i]['status']);
$new = outText($res['oDATA'][$i]['new']);
$sort_order = outText($res['oDATA'][$i]['sort_order']);
?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><?=$publish_date?></td>
      <td align="left"><?=$title?></td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=edit&id=<?=md5($id)?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td width="31" height="25" align="center"><?php if($status=="1") {  ?>
        <a href="NotificationAction.php?act=disable&id=<?=$id?>"><img src="images/enable.png" border="0" alt="Click to Disable" title="Disable"/></a>
        <?php
		} elseif ($status=="0") { ?>
        <a href="NotificationAction.php?act=enable&id=<?=$id?>"><img src="images/disable.png" border="0" alt="Enable" title="Click to Enable"/></a>
        <?php
		} ?>
      </td>
      <td width="25" align="center"><a href="javascript:void(0)"><img border="0" src="images/delete.png" align="Delete" title="Delete" onClick="deleteMessage(<?=$id?>)" /></a> </td>
	 
	  <td width="25" align="center">
	  <input type="checkbox" name="new" onclick="chkboxNB(this)" value="<?=$id?>" <?php if($new==1) echo 'checked="checked"';?>/>
	  <span id="newBlink<?=$id?>">
	  <?php if($new==1) echo '<font color="#009966">ON</font>';
	  		else{echo '<font color="#990000">OFF</font>';}
	  ?>
	  </span>
	  </td> 
	  <td width="25" align="center"><input type="text" class="minitbox" value="<?=$sort_order?>" name="sortorder[j<?=$id?>]" size="2"/></td>
    </tr>
    <?php } ?>
  </table>
  <div align="right"><input type="submit" value="Update Sort Order" class="sort_botton"/></div>
</form>
  <?php } ?>
</div>
