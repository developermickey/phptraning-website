<?php
if ($_GET[act] == "del") {
    $delid = $_GET[delid];
    $sql_del = mysql_query("delete from tbl_welcome where id= " . $delid . "");
    $msg = "Record Deleted Successfully.";
    print "<script>";
    print "self.location = 'video.php?msg=$msg';";
    print "</script>";
}
$project_sql = mysql_query("select * from tbl_welcome order by id desc");
$total = mysql_num_rows($project_sql);
?>

<div class="content_header">
  <div class="heading flleft">Welcome messege Management</div>
  <!--<div class="heading flright"> &nbsp;<a href="<?//=$_curpage?>?q=add">Add New Messege</a></div> -->
   <?php
	$i = 1;
	$project_sql = mysql_query("select * from tbl_welcome order by id desc");
	while ($row = mysql_fetch_array($project_sql)) {
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
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid" id="pagetable">
    <thead>
	<tr>
      <th width="42" align="center">S.N.</th>
      <th width="379" align="left" class="sort" onclick="sortdata('f.faculty_name')">Address Details</th>	  
	  <th width="465" align="left" class="sort" onclick="sortdata('f.faculty_designation')">Telephone</th> 
      <th width="219" align="left" class="sort" onclick="sortdata('f.faculty_designation')">Created_date</th>  
	  <!--<th width="142" align="left" class="sort" onclick="sortdata('f.faculty_type')">Updated_date</th>-->
      <th colspan="3" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
     <?php
	$i = 1;
	$project_sql = mysql_query("select * from tbl_welcome order by id desc");
	while ($row = mysql_fetch_array($project_sql)) {
	?>
    
    <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="left"><?php echo $row['video_title'];?></td>	  
	  <td align="left"><?php echo $row['video_desc'];?></td>
	  <td align="left"><?php echo $row['created_date'];?></td>
      <!--<td align="left"><?php echo $row['updated_date'];?></td>-->
	  <td align="center" width="71"><a href="welcom.php?q=edit&id=<?php print $row['id'] ?>"><img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <!--<td align="center" width="78"><a href="welcom.php?act=del&delid=<?php// print $row['id'] ?>" onClick="javascript:return confirm('Are you sure to delete ?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>      </td>-->
    </tr>
    <?php
	$i++;
	 } 
	 ?>
	</tbody>
  </table>
  <?php } 
  }
?>
</div>