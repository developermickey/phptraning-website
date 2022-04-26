<?php
if ($_GET[act] == "del") {
    $delid = $_GET[delid];
	$image_r=mysql_fetch_assoc(mysql_query("select * from tbl_attorney where id=$delid"));
   	$imgpath="../images/logo_client/".$image_r['logo'];
    $sql_del = mysql_query("delete from tbl_attorney where id= " . $delid . "");
	 if(file_exists($imgpath)){
      @unlink($imgpath);  
    }
    $msg = "Record Deleted Successfully.";
    print "<script>";
    print "self.location = 'manage_Attorney.php?msg=$msg';";
    print "</script>";
}
$client_sql = mysql_query("select * from tbl_attorney order by id desc");
$total = mysql_num_rows($client_sql);
?>

<div class="content_header">
  <div class="heading flleft">Trainer Management</div>
  <div class="heading flright"> &nbsp;<a href="<?=$_curpage?>?q=add">Add New Trainer</a></div> 
   <?php
	$i = 1;
	$banner_sql = mysql_query("select * from tbl_attorney order by id desc");
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
<form action="AttorneyAction.php" method="post">
<input type="hidden" name="act" value="sort" />
<?php

?>
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid" id="pagetable">
    <thead>
	<tr>
      <th width="29" align="center">S.N.</th>
      
      <th width="142" align="left" class="sort" onclick="sortdata('f.faculty_name')">Attorney Name</th>	  
	  <th width="216" align="left" class="sort" onclick="sortdata('f.faculty_designation')">Photo</th> 
      <th colspan="3" align="center">Actions</th>
    </tr>
	</thead>
	<tbody>
     <?php
	$i = 1;
	$banner_sql = mysql_query("select * from tbl_attorney order by id desc");
	while ($row = mysql_fetch_array($banner_sql)) {
	?>
    
    <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="left"><?php echo $row['client_name'];?></td>  
	  <td align="left">
      <?php if ($row['logo']) { ?>
        <img src="../images/logo_client/<?php print $row['logo']; ?>" width="50" height="64" />
    <?php } ?>
      </td>
     
	  
	  <td width="40" align="center"><a href="manage_Attorney.php?q=edit&id=<?php print $row['id'] ?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td align="center" width="52"><a href="manage_Attorney.php?act=del&delid=<?php print $row['id'] ?>" onClick="javascript:return confirm('Are you sure to delete ?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>      </td>
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
  <?php } 
  }
?>
</div>