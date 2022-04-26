<?php
if ($_GET[act] == "del") {
    $delid = $_GET[delid];
    $sql_del = mysql_query("delete from events where id= " . $delid . "");
	 
    $msg = "Record Deleted Successfully.";
    print "<script>";
    print "self.location = 'calender.php?msg=$msg';";
    print "</script>";
}
$banner_sql = mysql_query("select * from events order by id desc");
$total = mysql_num_rows($banner_sql);
?>

<div class="content_header">
  <div class="heading flleft">Calender Manege</div>
  <div class="heading flright"> &nbsp;<a href="<?=$_curpage?>?q=add">Add New Event date </a></div> 
   <?php
	$i = 1;
	$banner_sql = mysql_query("select * from events order by id desc");
	while ($row = mysql_fetch_array($banner_sql)) {
	?>
  
  <div class="clear"></div>
</div>
<div class="bodycontent">
 <?php
    if($_GET['msg']!=''){
    ?>
    <div style="text-align:center; color: red;"><?php echo $_GET['msg'];?></div>
  <?php
  }
if($total>0) { ?>
<form action="StaffAction.php" method="post">
<input type="hidden" name="act" value="sort" />
<?php

?>
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid" id="pagetable">
    <thead>
	<tr>
      <th width="35" align="center">S.N.</th>
      <th width="127" align="left" >Event From Date</th>
      <th width="132" align="left" >Event To Date</th>	  
	  <th width="237" align="left" >Title</th> 
      <th width="108" align="left" >Event Type</th>
      <!--<th width="133" align="left" >Hosted By</th>-->
      <th width="517" align="left" >Description</th> 
      <th colspan="3" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
     <?php
	$i = 1;
	$banner_sql = mysql_query("select * from events order by from_date asc");
	while ($row = mysql_fetch_array($banner_sql)) {
	?>
    
    <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="left"><?php echo date("Y-m-d", strtotime($row['from_date']));?></td>
      <td align="left"><?php echo date("Y-m-d", strtotime($row['to_date']));?></td>	  
	  <td align="left"><?php echo $row['event_title'];?></td>
      <td align="left"><?php echo $row['event_type'];?></td>
      <!--<td align="left"><?php echo $row['hosted_by'];?></td>-->
      <td align="left"><?php echo $row['description'];?></td>
	  <td width="36" align="center"><a href="calender.php?q=edit&id=<?php print $row['id'] ?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td align="center" width="46"><a href="calender.php?act=del&delid=<?php print $row['id'] ?>" onClick="javascript:return confirm('Are you sure to delete ?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>      </td>
    </tr>
    <?php
	$i++;
	 } 
	 ?>
	</tbody>
  </table>
</form>
  <?php } 
  }
?>
</div>