<?php 
$required = "<font color='#FF0000' size='1'>*</font>";
$id = filter($_REQUEST['id']);
$res = $announcementObj->getAnnouncementById($id); 
$total = $res['NO_OF_ITEMS'];
$type = outText($res['oDATA'][0]['type']);
if($type == 0){$display = 'style="display:block;"';}else{$display = 'style="display:none;"';}
if($type == 1){$display1 = 'style="display:block;"';}else{$display1 = 'style="display:none;"';}
if($type == 2){$display2 = 'style="display:block;"';}else{$display2 = 'style="display:none;"';}
?>
<div class="content_header">
  <div class="heading flleft">Update Upcoming Course</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form name="frmnotice" action="announcementAction.php" method="post" onsubmit="return happenings_valid()" enctype="multipart/form-data">
    <input type="hidden" name="act" value="updatenew" />
	<input type="hidden" name="id" value="<?=$res['oDATA'][0]['id'];?>" />
    <div id="validation_div" class="validation_error" align="center"></div>
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="117" align="left" class="label">Type <?=$required?></td>
          <td width="8" align="center">:</td>
          <td align="left">
		 <input type="radio" name="type" value="0"  <?php if($type==0) echo 'checked="checked"';?> onclick="ShowDesc();" />Descriptive &nbsp;
		<input type="radio" name="type" value="1"  onclick="ShowUpload();" <?php if($type==1) echo 'checked="checked"';?>/>Upload File &nbsp;
		<input type="radio" name="type" value="2"  onclick="Showlink();" <?php if($type==2) echo 'checked="checked"';?>/>Link
		</td>
        </tr>
        <tr>
          <td align="left" class="label">Title <?=$required?></td>
          <td align="center" class="label">:</td>
          <td> <textarea name="title" style="width:99%;height: 50px;"  id="title" onblur="fillURL(this.value,'url')"><?=outText($res['oDATA'][0]['title']);?></textarea></td>
        </tr>
		 
        <tr>
          <td align="left" class="label">Publish Date <?=$required?></td>
          <td align="center">:</td>
          <td>	<input class="two" type="text" name="publish_date" value="<?=outText($res['oDATA'][0]['publish_date']);?>" readonly=""/>
</td>
        </tr>
         <tr>
          <td colspan="3">
		  <div id="desc" <?=$display?>>
		   <b>URL <?=$required?></b><br />
		  <input type="text" name="url" id="url" value="<?=outText($res['oDATA'][0]['url']);?>" size="70" maxlength="20"/><font color="#990000"><i> URL in text format (Max 20 chars)</i></font>
		  <br />
		  <b>Description</b><br />
		  <textarea name="description" style="width:99%;height: 100px;"><?=outText($res['oDATA'][0]['description']);?></textarea>
		</div>
		
		<div id="file" <?=$display1?>>
			<b>Upload file</b> &nbsp;<br />
			<input type="file" name="file_name" onchange="javascript:return validNewsFile(this.value)" value=""/>
			<?php if($res['oDATA'][0]['file_name']) {?><a href="../announcement/<?=outText($res['oDATA'][0]['file_name']);?>" target="_blank">view</a><?php }?>
			<br /><span style="color:#990000; font-style:italic;">(Only Image, pdf allowed)</span>
		</div>
		<div id="link" <?=$display2?>>
			<b>Web Link</b> &nbsp;<br /><input type="text" name="link" value="<?=outText($res['oDATA'][0]['link']);?>" size="60"/>	
		</div>
		  </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="submit" value="Submit" class="button" /></td>
        </tr>
      </table>
  </form>
</div>
