<?php
if ($_GET[act] == "del") {
    $delid = $_GET[delid];
   	  $sql_del = mysql_query("delete from tbl_paper where id= " . $delid . "");
	// if(file_exists($imgpath)){
     // @unlink($imgpath);  
    //}
    $msg = "Record Deleted Successfully.";
    print "<script>";
    print "self.location = 'managepaper.php?msg=$msg';";
    print "</script>";
}
$paper_sql = mysql_query("select * from tbl_paper order by id desc");
$total = mysql_num_rows($paper_sql);

//corp echo text
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '<a href="#" title="'.$x.'"> ...</a>';
    echo $y;
  }
}
?>

<div class="content_header">
  <div class="heading flleft">Case Studies</div>
  <div class="heading flright"> &nbsp;<a href="<?=$_curpage?>?q=add">Add New Case</a></div> 
   <?php
	$i = 1;
	$paper_sql = mysql_query("select * from tbl_paper order by id desc");
	while ($row = mysql_fetch_array($paper_sql)) {
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
      <th width="33" align="center">S.N.</th>
      <th width="73" align="left" >Year</th>	  
	  <th width="200" align="left" >Case Heading</th> 
      <th width="200" align="left" >Short Description</th> 

      <th align="center" colspan="2">Actions</th>
    </tr>
	</thead>
	<tbody>
    <?php
	$i = 1;
	$paper_sql = mysql_query("select * from tbl_paper order by id desc");
	while ($row = mysql_fetch_array($paper_sql)) {
	?>
    
    <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="left"><?php echo $row['month'];?><?php echo $row['year'];?></td>	  
	  <td align="left"><?php custom_echo($row['title'],15);?></td>
      <td align="left"><?php echo $row['auther1'];?></td>
	  <?php /*?><td align="left"><?php custom_echo($row['barea'],15); ?></td><?php */?>
	 <?php /*?> <td align="left"><?php custom_echo($row['kayword'],15); ?></td>
	  <td align="left"><?php custom_echo($row['desc'],15); ?></td>
	  <td align="left">
	  <?php 
	  if($row['file']){
	  ?>
      <a href="../paperfile/<?php echo $row['file']; ?>" target="_blank" title="<?php echo $row['file']; ?>">Download</a>
      <?php } ?>
      </td><?php */?>
	  <td width="32" align="center"><a href="managepaper.php?q=edit&id=<?php print $row['id'] ?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td align="center" width="53"><a href="managepaper.php?act=del&delid=<?php print $row['id'] ?>" onClick="javascript:return confirm('Are you sure to delete ?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>      </td>
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