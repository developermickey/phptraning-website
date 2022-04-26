<?php
//menu.php
$pid = isset($_GET['pid'])?(int)$_GET['pid']:0;
$total_page = $menuObj->getTotalMenu($pid); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['menu-management']['orderby'])?$_SESSION[SES]['menu-management']['orderby']:"m.menu_id";
$order = isset($_SESSION[SES]['menu-management']['order'])?$_SESSION[SES]['menu-management']['order']:"desc";

$res = $menuObj->getMenu($pid, $page*PAGE_LIMIT, $orderby, $order); 
$total = $res['NO_OF_ITEMS'];
$parent_id = $menuObj->getParentMenuID($pid);
if($pid!=0) {
	$heading = "Submenu under <u><i>". $menuObj->getMenuName($pid). "</i></u>";
	$heading2 = "Add Submenu";
}
else {
	$heading = "Menu &amp; Sub-Menu Management";
	$heading2 = "Add Menu";
}
?>
<div class="content_header">
  <div class="heading flleft"><?=$heading?></div>
  <div class="heading flright"><?php if($total_page>0) { ?>
  <select name="page" onchange="document.location.href='<?=$_curpage?>?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select>&nbsp;|&nbsp;<?php } ?><a href="<?=$_curpage?>?pid=<?=$pid?>&q=add"><?=$heading2?></a>
		<?php if($pid>0) {?>
		<a href="<?=$_curpage?>?pid=<?=(int)$parent_id?>">&laquo; BACK</a><?php } ?>
  </div>
  <div class="clear"></div>
</div>
<div class="bodycontent">
<?php
if($total>0) { ?>
<table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid">
  <tr>
	<th width="20">S.N.</th>
    <th>ID</th>
	<th width="240" class="sort" onclick="sortdata('menu_name')">Title</th>
	<th>Link Page</th>
	<th width="80" class="sort" onclick="sortdata('menu_position')" align="left">Position</th>
	<th colspan="3">Actions</th>
  </tr>
<?php			
for($i=0;$i<$total;$i++) { 
	$menu_id = outText($res['oDATA'][$i]['menu_id']);
	$menu_name = outText($res['oDATA'][$i]['menu_name']);
	$menu_url = outText($res['oDATA'][$i]['menu_url']);
	$_SESSION[SES]['admin']['menu_name'][$menu_id] = $menu_name;
	$menu_page = outText($res['oDATA'][$i]['menu_page']);
	if((int)$menu_page>0) {
		$menu_page_name_res = $pageObj->getPageNames($menu_page);
		$menu_page_name = $menu_page_name_res['oDATA'][0]['page_name'];
	}
	else {
		$menu_page_name = $menu_page;
	}
	$menu_position = outText($res['oDATA'][$i]['menu_position']); ?>
 <tr>
	<td align="center"><?=($i+1)?></td>
    <td align="center"><?=$menu_id?></td>
	<td align="left"><?=$menu_name?></td>
	<td align="left"><?=$menu_page_name?></td>
	<td align="center"><?=$menu_position?></td>
	<td align="center" width="10"><a href="<?=$_curpage?>?pid=<?=$menu_id?>">Submenu</a></td>
	<td align="center" width="10"><a href="<?=$_curpage?>?q=edit&mid=<?=$menu_id?>">Edit</a></td>
    <td align="center" width="10"><a href="MenuAction.php?act=del&mid=<?=$menu_id?>" onclick="confirm('Are you sure to delete this menu ?')">Delete</a></td>
  </tr>
<?php } ?>          
</table>
<?php } ?>
</div>