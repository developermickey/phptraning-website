<?php
if ($_GET[act] == "del") {
    $delid = $_GET[delid];
    $sql_del = mysql_query("delete from tbl1_testimonial where id= " . $delid . "");
	
    $msg = "Record Deleted Successfully.";
    print "<script>";
    print "self.location = 'testimonial.php?msg=$msg';";
    print "</script>";
}
$p_sql = mysql_query("select * from tbl1_testimonial order by id desc");
$total = mysql_num_rows($p_sql);
?>
<div class="content_header">
  <div class="heading flleft">Services Management</div>
  <div class="heading flright"> &nbsp;<a href="<?=$_curpage?>?q=add">Add New Services</a></div> 
  
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
<form action="ServiceAction.php" method="post">
<input type="hidden" name="act" value="sort" />
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid" id="pagetable">
    <thead>
	<tr>
      <th width="29" align="center">S.N.</th>
      <th width="142" align="left" class="sort" onclick="sortdata('f.faculty_name')">title</th>
       <th width="216" align="left" class="sort" >Photo</th>
      <th width="142" align="left" class="sort" onclick="sortdata('f.faculty_name')">contents</th>
       <th colspan="3" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
     <?php
	$i = 1;
	$test_sql = mysql_query("select * from tbl1_testimonial order by id desc");
	while ($row = mysql_fetch_array($test_sql)) {
	
	?>
    
    <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="left"><?php echo $row['title'];?></td>	
    
    	  <td align="left">
      <?php if ($row['logo']) { ?>
        <img src="../images/logo_client/<?php print $row['logo']; ?>" width="150" height="100" />
    <?php } ?>
      </td>
      <td align="left"><?php echo $row['contents'];?></td>	
        <td align="center" width="50"><a href="testimonial.php?q=edit&id=<?php print $row['id'] ?>"><img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>  
      <td align="center" width="52"><a href="testimonial.php?act=del&delid=<?php print $row['id'] ?>" onClick="javascript:return confirm('Are you sure to delete ?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>      </td>
      <td width="25" align="center"><input type="text" class="minitbox" value="<?php echo $row['sort_order'];?>" name="sortorder[j<?php print $row['id'] ?>]" size="2"/></td>
    </tr>
    <?php
	$i++;
	 } 
	 ?>
	</tbody>
  </table>
  <div align="right"><input type="submit" value="Update Sort Order" class="sort_botton"/></div>
</form>
  <?php 
  } 
?>
</div>