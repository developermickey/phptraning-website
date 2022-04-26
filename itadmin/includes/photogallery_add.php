<?php $required = "<font color='#FF0000' size='1'>*</font>";
$id = $_REQUEST['id'];
$res = $phoObj->getCategoryById($id); 
$category_id = $res['oDATA'][0]['category_id'];
$category_name = stripslashes($res['oDATA'][0]['category_name']);
?>
<div class="content_header">
  <div class="heading flleft">Add New Photo</div>
  <div class="heading flright"><a href="photo-gallery.php?q=photogallery&id=<?=$id?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form name="frm" action="PhotoAction.php" method="post" onsubmit="return photo_valid(this)" enctype="multipart/form-data">
    <input type="hidden" name="act" value="addphoto" />
	 <input type="hidden" name="id" value="<?=$id?>" />
	 <input type="hidden" name="photo_category" value="<?=$category_id?>" />
    <div id="validation_div" class="validation_error" align="center"></div>
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center" id="gal">        
        <tr>
          <th align="center" class="label">S.N.</th>
          <th align="left" class="label">Title <?=$required?></th>
          <th align="left" class="label">Upload Photo <?=$required?></th>
        </tr>
		<tr>
          <td align="left" class="label">1</td>
          <td align="left" valign="top">
		  <textarea name="photo_caption[]" rows="3" cols="60"></textarea>
		  </td>
          <td align="left"><input type="file" name="photo_file[]" onchange="javascript:return validNewsFile(this.value)" value=""/></td>
        </tr>
      </table>
	   <div style="margin:6px 0;"> <a href="javascript:void(0)" onclick="addPhotoGalleryRow('gal')"> <b>+</b> Add Another Row</a><span id="delrow"> | <a href="javascript:void(0)" onclick="deletehotoGalleryRow('gal')"><b>-</b>Delete Last Row</a></span> </div>
	  <div align="center"><input type="submit" name="submit" value="Add Photo" class="button" /></div>
	  <div>&nbsp;</div>
  </form>
</div>
