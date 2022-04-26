<?php
//faculties_list.php
$orderby = isset($_SESSION[SES]['faculties-management']['orderby'])?$_SESSION[SES]['faculties-management']['orderby']:"f.faculty_id";
$order = isset($_SESSION[SES]['faculties-management']['order'])?$_SESSION[SES]['faculties-management']['order']:"desc";

$total_page = $fObj->getTotalFacPages(); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$res = $fObj->getAllFaculties($page*PAGE_LIMIT, $orderby, $order); 
$total = $res['NO_OF_ITEMS'];
?>

<div class="content_header">
  <div class="heading flleft">Staff Management</div>
  <div class="heading flright"> &nbsp;<a href="<?=$_curpage?>?q=add">Add New Staff</a></div> 
  <?php if($total_page>0) { ?>
  <div class="flright">
  <select name="page" onchange="document.location.href='<?=$_curpage?>?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select> &nbsp;</div>
  <?php } ?>
  <div class="clear"></div>
</div>
<div class="bodycontent">
  <?php
if($total>0) { ?>
<form action="StaffAction.php" method="post">
<input type="hidden" name="act" value="sort" />
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid" id="pagetable">
    <thead>
	<tr>
      <th width="30" align="center">S.N.</th>
      <th align="left" class="sort" onclick="sortdata('f.faculty_name')">Faculty Name</th>	  
	  <th align="left" class="sort" onclick="sortdata('f.faculty_designation')">Designation</th>  
	  <th align="left" class="sort" onclick="sortdata('f.faculty_type')">TYPE</th>
      <th colspan="3" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
    <?php			
for($i=0;$i<$total;$i++) { 
	$faculty_id = outText($res['oDATA'][$i]['faculty_id']);
	$faculty_name = outText($res['oDATA'][$i]['faculty_name']);
	$faculty_type = strtoupper(outText($res['oDATA'][$i]['faculty_type']));
	$faculty_designation = outText($res['oDATA'][$i]['faculty_designation']);
	$faculty_order = outText($res['oDATA'][$i]['faculty_order']);
	?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><?=$faculty_name?></td>	  
	  <td align="left"><?=$faculty_designation?></td>
	  <td align="left"><?=$faculty_type?></td>
	  <td align="center" width="50"><input type="text" value="<?=$faculty_order?>" name="sortorder[j<?=$faculty_id?>]" style="width:30px;"/></td>
      <td align="center" width="50"><a href="<?=$_curpage?>?q=edit&id=<?=$faculty_id?>"><img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td align="center" width="50"><a href="StaffAction.php?act=del&id=<?=$faculty_id?>" onclick="return confirm('Are You Sure Delete This Faculty?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a></td>
    </tr>
    <?php } ?>
	</tbody>
  </table><div align="right" style="margin-top:5px;margin-right:5px;"><input type="submit" value="Sort Order" class="button"/></div>
</form>
  <?php } ?>
</div>
