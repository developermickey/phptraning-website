<?php $required = "<font color='#FF0000' size='1'>*</font>";?>
<div class="content_header">
  <div class="heading flleft">Add New Notice</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form name="frmnotice" action="NotificationAction.php" method="post" onsubmit="return notice_valid()" enctype="multipart/form-data">
    <input type="hidden" name="act" value="addnotice" />
    <div id="validation_div" class="validation_error" align="center"></div>
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="117" align="left" class="label">Type <?=$required?></td>
          <td width="8" align="center">:</td>
          <td align="left">
		  <input type="radio" name="type" value="0" checked="checked" onclick="ShowDesc();"/>Descriptive &nbsp;
		<input type="radio" name="type" value="1"  onclick="ShowUpload();"/>Upload File &nbsp;
		<input type="radio" name="type" value="2"  onclick="Showlink();"/>Link</td>
        </tr>
        <tr>
          <td align="left" class="label">Title <?=$required?></td>
          <td align="center" class="label">:</td>
          <td><textarea name="title" style="width:99%;height: 50px;"  id="title" onblur="fillURL(this.value,'url')"></textarea></td>
        </tr>
        <tr>
          <td align="left" class="label">Publish Date <?=$required?></td>
          <td align="center">:</td>
          <td>
		  <input class="two" type="text" name="publish_date" value="" readonly=""/>
		 </td>
        </tr>
         <tr>
          <td colspan="3">
		  <div id="desc">
		  <b>URL <?=$required?></b><br />
		  <input type="text" name="url" id="url" value="" size="70"  maxlength="20"/>
		  <font color="#990000"><i> URL in text format (Max 20 chars)</i></font>
		  <br />
		  <b>Description</b><br />
		  <textarea name="description" style="width:99%;height: 100px;"></textarea>
		  <br />
		  
		</div>
		
		<div style="display:none;" id="file">
			<b>Upload file</b> &nbsp;<br />
			<input type="file" name="file_name" onchange="javascript:return validNewsFile(this.value)" value=""/>
			<br /><span style="color:#990000; font-style:italic;">(Only Image, pdf allowed)</span>
		</div>
		<div style="display:none;" id="link">
			<b>Web Link</b> &nbsp;<br /><input type="text" name="link" value="" size="60"/>	
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
