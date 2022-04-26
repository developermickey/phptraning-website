<script language="javascript">
function deleteMessage(u_id){
	if(confirm("Are you sure to delete this photo category?")){
		document.location.href="PhotoAction.php?act=del&id="+u_id;
	}
}
</script>
 <?php
$total_page = $phoObj->getTotalCategory(); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['photo-category']['orderby'])?$_SESSION[SES]['photo-category']['orderby']:"category_id";
$order = isset($_SESSION[SES]['photo-category']['order'])?$_SESSION[SES]['photo-category']['order']:"desc";
$res = $phoObj->getAllCategory($page*PAGE_LIMIT,$orderby, $order); 
$total = $res['NO_OF_ITEMS'];
?>
<div class="content_header">
  <div class="heading flleft">Photo Gallery Management</div>
  <div class="heading flright"><a href="photo-gallery.php?q=add">Add New Category</a></div>
  <div class="flright"><select name="page" onchange="document.location.href='photo-gallery.php?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select>&nbsp;|&nbsp;</div>
  <div class="clear"></div>
</div>
<div class="bodycontent">
<?php if($total>0) {?>
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid">
    <tr>
      <th width="30">S.N.</th>
      <th  class="sort" onclick="sortdata('category_name')">Category</th>
      <th colspan="4">Actions</th>
    </tr>
    <?php			
for($i=0;$i<$total;$i++) { 
$id = $res['oDATA'][$i]['category_id'];
$category_name = outText($res['oDATA'][$i]['category_name']);
$category_url = outText($res['oDATA'][$i]['category_url']);
$status = outText($res['oDATA'][$i]['category_status']);
?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><?=$category_name?></td>
	    <td width="25" align="center"><a href="<?=$_curpage?>?q=photogallery&id=<?=md5($id)?>"> <img border="0" src="images/alumbplus.png" align="Edit" title="Photo Gallery" /></a></td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=edit&id=<?=md5($id)?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td width="31" height="25" align="center"><?php if($status=="1") {  ?>
        <a href="PhotoAction.php?act=disable&id=<?=$id?>"><img src="images/enable.png" border="0" alt="Click to Disable" title="Disable"/></a>
        <?php
		} elseif ($status=="0") { ?>
        <a href="PhotoAction.php?act=enable&id=<?=$id?>"><img src="images/disable.png" border="0" alt="Enable" title="Click to Enable"/></a>
        <?php
		} ?>
      </td>
      <td width="25" align="center"><a href="javascript:void(0)"><img border="0" src="images/delete.png" align="Delete" title="Delete" onClick="deleteMessage(<?=$id?>)" /></a> </td>
    </tr>
    <?php } ?>
  </table>
  <?php } ?>
</div>
