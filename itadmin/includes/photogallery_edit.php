<?php $required = "<font color='#FF0000' size='1'>*</font>";
$cid = filter($_REQUEST['cid']);
$id = filter($_REQUEST['id']);
$res = $phoObj->getPhotoById($id); 
$photo_id = $res['oDATA'][0]['photo_id'];
$photo_caption = stripslashes($res['oDATA'][0]['photo_caption']);
?>
<div class="content_header">
  <div class="heading flleft">Update Photo</div>
  <div class="heading flright"><a href="photo-gallery.php?q=photogallery&id=<?=$cid?>&page=<?=$page?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form name="frm" action="PhotoAction.php" method="post" onsubmit="return photo_editvalid()" enctype="multipart/form-data">
    <input type="hidden" name="act" value="editphoto" />
	<input type="hidden" name="id" value="<?=$cid?>" />
	 <input type="hidden" name="photo_id" value="<?=$photo_id?>" />
	 <input type="hidden" name="page" value="<?=$page?>" />
    <div id="validation_div" class="validation_error" align="center"></div>
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        
        <tr>
          <td align="left" class="label">Title <?=$required?></td>
          <td align="center" class="label">:</td>
          <td>
		  <textarea name="photo_caption" rows="3" cols="60"><?=$photo_caption?></textarea>
		  </td>
        </tr>
		 <tr>
          <td align="left" class="label">Upload Photo <?=$required?></td>
          <td align="center">:</td>
          <td>
			<input type="file" name="photo_file" onchange="javascript:return validNewsFile(this.value)" value=""/>		 </td>
        </tr>
         
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="submit" value="Update Photo" class="button" /></td>
        </tr>
      </table>
  </form>
</div>
