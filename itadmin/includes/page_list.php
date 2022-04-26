<?php
//page_list.php
$total_page = $pageObj->getTotalPages(); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['page-management']['orderby'])?$_SESSION[SES]['page-management']['orderby']:"page_id";
$order = isset($_SESSION[SES]['page-management']['order'])?$_SESSION[SES]['page-management']['order']:"desc";
$res = $pageObj->getAllPages($page*PAGE_LIMIT, $orderby, $order); 
$total = $res['NO_OF_ITEMS'];
?>

<div class="content_header">
  <div class="heading flleft">Page Management</div>
  <div class="heading flright"><a href="<?=$_curpage?>?q=add">Add New Page</a></div>
  <div class="flright"><select name="page" onchange="document.location.href='page-management.php?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select>&nbsp;|&nbsp;</div>
  <div class="clear"></div>
</div>
<div class="bodycontent">
  <?php
if($total>0) { ?>
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid" id="pagetable">
    <thead>
	<tr>
      <th width="30" align="center">S.N.</th>
      <th align="center" class="sort" onclick="sortdata('page_name')">Page Name</th>
	  <th width="110" class="sort" align="center" onclick="sortdata('page_type')">Page Type</th>
      <th width="170" class="sort" align="center" onclick="sortdata('page_updated')">Last Updated</th>
      <th colspan="2" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
    <?php			
for($i=0;$i<$total;$i++) { 
	$page_id = outText($res['oDATA'][$i]['page_id']);
	$page_name = outText($res['oDATA'][$i]['page_name']);
	$page_updated = formatDate(outText($res['oDATA'][$i]['page_updated']));
	$page_type = strtoupper(outText($res['oDATA'][$i]['page_type'])); ?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><?=$page_name?></td>
	  <td align="center"><?=$page_type?></td>
      <td align="center"><?=$page_updated?></td>
      <td align="center" width="50"><a href="<?=$_curpage?>?q=edit&pid=<?=$page_id?>&page=<?=$page?>"><img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td align="center" width="50"><a href="PageAction.php?act=delpage&pid=<?=$page_id?>&page=<?=$page?>" onclick="return confirm('Are You Sure Delete This Page?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a></td>
    </tr>
    <?php } ?>
	</tbody>
  </table>
  <?php } ?>
</div>
