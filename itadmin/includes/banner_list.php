<?php
if ($_GET[act] == "del") {
    $delid = $_GET[delid];
	$image_r=mysql_fetch_assoc(mysql_query("select banner_image from tbl_banner where id=$delid"));
   	$imgpath="../upload_image/".$image_r['banner_image'];
    $sql_del = mysql_query("delete from tbl_banner where id= " . $delid . "");
	 if(file_exists($imgpath)){
      @unlink($imgpath);  
    }
    $msg = "Record Deleted Successfully.";
    print "<script>";
    print "self.location = 'managebanner.php?msg=$msg';";
    print "</script>";
}
$banner_sql = mysql_query("select * from tbl_banner order by id desc");
$total = mysql_num_rows($banner_sql);
?>

<div class="content_header">
  <div class="heading flleft">Banner Management</div>
  <div class="heading flright"> &nbsp;<a href="<?=$_curpage?>?q=add">Add New Banner</a></div> 
   <?php
	$i = 1;
	$banner_sql = mysql_query("select * from tbl_banner order by id desc");
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
      <th width="29" align="center">S.N.</th>
      <th width="142" align="left" class="sort" onclick="sortdata('f.faculty_name')">Banner Name</th>	  
	  <th width="216" align="left" class="sort" onclick="sortdata('f.faculty_designation')">Image</th> 
      <th width="410" align="left" class="sort" onclick="sortdata('f.faculty_designation')">Description</th>  
	  <th width="142" align="left" class="sort" onclick="sortdata('f.faculty_type')">Sequence</th>
      <th colspan="3" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
     <?php
	$i = 1;
	$banner_sql = mysql_query("select * from tbl_banner order by id desc");
	while ($row = mysql_fetch_array($banner_sql)) {
	?>
    
    <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="left"><?php echo $row['banner_name'];?></td>	  
	  <td align="left">
      <?php if ($row['banner_image']) { ?>
        <img src="../upload_image/<?php print $row['banner_image']; ?>" width="150" height="100" />
    <?php } ?>
      </td>
      <td align="left"><?php echo $row['banner_desc'];?></td>
	  <td align="left"><?php echo $row['banner_sequence']; ?></td>
	  <td width="40" align="center"><a href="managebanner.php?q=edit&id=<?php print $row['id'] ?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td align="center" width="52"><a href="managebanner.php?act=del&delid=<?php print $row['id'] ?>" onClick="javascript:return confirm('Are you sure to delete ?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>      </td>
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