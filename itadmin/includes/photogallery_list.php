<script language="javascript">
function deleteMessage(u_id,id){ alert(id);
	if(confirm("Are you sure to delete this photo ?")){
		document.location.href="PhotoAction.php?act=delphoto&id="+u_id;
	}
}
</script>
 <?php
$cid = isset($_GET['id'])?$_GET['id']:0;

$total_page = $phoObj->getTotalPhotoGallery($cid); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['photo-gallery']['orderby'])?$_SESSION[SES]['photo-gallery']['orderby']:"photo_id";
$order = isset($_SESSION[SES]['photo-gallery']['order'])?$_SESSION[SES]['photo-gallery']['order']:"desc";
$res = $phoObj->getAllPhotoGallery($page*PAGE_LIMIT,$orderby, $order,$cid); 
$total = $res['NO_OF_ITEMS'];

$res_1 = $phoObj->getCategoryById($id); 
$category_name = outText($res_1['oDATA'][0]['category_name']);
?>
<div class="content_header">
  <div class="heading flleft"><?=$category_name?> Gallery </div>
  <div class="heading flright"><a href="photo-gallery.php?q=addphoto&id=<?=$cid?>">Add New Photo</a></div>
  <div class="flright"><select name="page" onchange="document.location.href='photo-gallery.php?q=photogallery&id=<?=$cid?>&page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select>&nbsp;|&nbsp;</div>  
		  <div class="heading flright"><a href="photo-gallery.php">Photo Gallery</a></div>
  <div class="clear"></div>
</div>
<div class="bodycontent">
<?php if($total>0) {?>
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid">
    <tr>
      <th width="30">S.N.</th>
      <th >Name</th>
	  <th align="center" width="150">Photo</th>
      <th colspan="3">Actions</th>
    </tr>
    <?php			
for($i=0;$i<$total;$i++) { 
$id = $res['oDATA'][$i]['photo_id'];
$photo_caption = outText($res['oDATA'][$i]['photo_caption']);
$photo_file = outText($res['oDATA'][$i]['photo_file']);
$status = outText($res['oDATA'][$i]['photo_status']);
$image = "../photo/".$photo_file;
$img = showImage($image,$width="",$height="100",$alt="NLUO",$title="$photo_caption",$parameters="0");
?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><?=$photo_caption?></td>
	  <td align="center"><?=$img?></td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=editphoto&id=<?=md5($id)?>&cid=<?=$cid?>&page=<?=$page?>"> <img border="0" src="images/edit.png" align="Edit" title="Edit" /></a></td>
      <td width="31" height="25" align="center"><?php if($status=="1") {  ?>
        <a href="PhotoAction.php?act=disablephoto&id=<?=$id?>&cid=<?=$cid?>&page=<?=$page?>"><img src="images/enable.png" border="0" alt="Click to Disable" title="Disable"/></a>
        <?php
		} elseif ($status=="0") { ?>
        <a href="PhotoAction.php?act=enablephoto&id=<?=$id?>&cid=<?=$cid?>&page=<?=$page?>"><img src="images/disable.png" border="0" alt="Enable" title="Click to Enable"/></a>
        <?php
		} ?>
      </td>
      <td width="25" align="center">
	  <a href="PhotoAction.php?act=delphoto&id=<?=$id?>&cid=<?=$cid?>&page=<?=$page?>" onclick="return confirm('Are You Sure Delete This?')"><img border="0" src="images/delete.png" align="Delete" title="Delete" /></a>
	  </td>
    </tr>
    <?php } ?>
  </table>
  <?php } ?>
</div>
