<?php
if ($_GET[act] == "del") {
    $delid = $_GET[delid];
	$image_r=mysql_fetch_assoc(mysql_query("select image from tbl_bestseller where id=$delid"));
   	$imgpath="../best_seller/".$image_r['image'];
    $sql_del = mysql_query("delete from tbl_bestseller where id= " . $delid . "");
	 if(file_exists($imgpath)){
      @unlink($imgpath);  
    }
    $msg = "Record Deleted Successfully.";
    print "<script>";
    print "self.location = 'bestseller.php?msg=$msg';";
    print "</script>";
}
$b_sql = mysql_query("select * from tbl_bestseller order by id desc");
$total = mysql_num_rows($b_sql);
?>

<div class="content_header">
  <div class="heading flleft">Bestseller Management</div>
  <div class="heading flright"> &nbsp;<a href="<?=$_curpage?>?q=add">Add New Bestseller</a></div> 
  
  <div class="clear"></div>
</div>
<div class="bodycontent">
 <?php
    if($_GET['msg']!=''){
    ?>
    <div style="text-align:center; color: red;"><?php echo $_GET['msg'];?></div>
  <?php
  }
 ?>
<form action="StaffAction.php" method="post">
<input type="hidden" name="act" value="sort" />
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid" id="pagetable">
    <thead>
	<tr>
      <th width="29" align="center">S.N.</th>
      <th width="142" align="left" class="sort" onclick="sortdata('f.faculty_name')">Title</th>	  
	  <th width="216" align="left" class="sort" onclick="sortdata('f.faculty_designation')">Image</th>
      <th colspan="3" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
     <?php
	$i = 1;
	$bestseller_sql = mysql_query("select * from tbl_bestseller order by id desc");
	while ($row = mysql_fetch_array($bestseller_sql)) {
	?>
    
    <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="left"><?php echo $row['title'];?></td>	  
	  <td align="left">
      <?php if ($row['image']) { ?>
        <img src="../best_seller/<?php print $row['image']; ?>" width="80" height="100" />
    <?php } ?>
      </td>
	  <td width="40" align="center"><a href="bestseller.php?q=edit&id=<?php print $row['id'] ?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td align="center" width="52"><a href="bestseller.php?act=del&delid=<?php print $row['id'] ?>" onClick="javascript:return confirm('Are you sure to delete ?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>      </td>
    </tr>
    <?php
	$i++;
	 } 
	 ?>
	</tbody>
  </table>
</form>
</div>