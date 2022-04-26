<?php
//page_edit.php
$required = "<font color='#FF0000' size='1'>*</font>";
if(isset($_SESSION[SES]['pagedata'])) {
	$pdata = $_SESSION[SES]['pagedata'];
	extract($pdata);
	$page_contents = ($pdata['page_content_static']!="")?$pdata['page_content_static']:$pdata['page_content_dynamic'];
	unset($_SESSION[SES]['pagedata']);
}
else {
	$page_id = isset($_GET['pid'])?$_GET['pid']:0;
	$ped_res = $pageObj->getPageById($page_id);
	if($ped_res['NO_OF_ITEMS']>0) {
		$page_id = (int)$ped_res['oDATA'][0]['page_id'];
		$page_name = outText($ped_res['oDATA'][0]['page_name']);
		$page_url = outText($ped_res['oDATA'][0]['page_url']);
		$page_type = outText($ped_res['oDATA'][0]['page_type']);
		$page_title = outText($ped_res['oDATA'][0]['page_title']);
		$page_metakeywords = outText($ped_res['oDATA'][0]['page_metakeywords']);
		$page_metadesc = outText($ped_res['oDATA'][0]['page_metadesc']);
		$page_contents = outText($ped_res['oDATA'][0]['page_contents']);
		 $image = outText($ped_res['oDATA'][0]['image']);
		$editable = outText($ped_res['oDATA'][0]['editable']);
		if($editable) $ro = "";
		else $ro = 'readonly="true" class="readonly"';
	}
}
$page =filter($_REQUEST['page']);
?>

<div class="content_header">
  <div class="heading flleft">Edit Page <u><i>
    <?=$page_name?>
    </i></u></div>
  <div class="heading flright"><a href="<?=$_curpage?>?page=<?=$page?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form action="PageAction.php" method="post" name="pageeditfrm" onsubmit="return page_valid(this);" enctype="multipart/form-data">
    <input type="hidden" name="act" value="editpage" />
    <input type="hidden" name="page_id" value="<?=$page_id?>" />
	<input type="hidden" name="page" value="<?=$page?>" />
    <div id="validation_div" class="validation_error"></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
      <tr>
        <td align="left" class="label">Page Name <?=$required?><br />
          <span class="hint">(e.g. Page Name)</span></td>
        <td width="20" align="center">:</td>
        <td align="left"><input type="text" name="page_name" value="<?=$page_name?>" size="60" onblur="fillURL(this.value,'page_url')"/></td>
      </tr>
      <tr>
        <td align="left" class="label">Page URL <?=$required?><br />
          <span class="hint">(e.g. page-url)</span></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="page_url" id="page_url" value="<?=$page_url?>" size="60" title="It is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens." <?=$ro?>/></td>
      </tr>
	  <tr>
        <td align="left" class="label">Page Type <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><select name="page_type" onchange="setPageContentType(this)">
              <option value="static" <?php if($page_type=="static") echo ' selected="selected"';?>>Static</option>
			  <option value="dynamic" <?php if($page_type=="dynamic") echo ' selected="selected"';?>>Dynamic</option>
            </select></td>
      </tr>
      
      <tr>
      <td align="left" class="label">Upload Photo</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" id="img"/>
      <input type="hidden" name="T2" value="<?php echo $image;?>" />
     <?php 
	   if($image!='') {
      ?>
      <img height="100" width="100" src="../images/logo_client/<?php echo $image;?>" />
	  <?php
	  }?>
      </td>
      </tr>
      
      
      <tr>
        <td align="left" class="label">Page Title <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="page_title" value="<?=$page_title?>" size="60"/></td>
      </tr>
      <tr>
        <td align="left" class="label">Meta Keywords</td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="page_metakeywords" value="<?=$page_metakeywords?>" size="60"/></td>
      </tr>
      <tr>
        <td align="left" class="label">Meta Description</td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="page_metadesc" value="<?=$page_metadesc?>" size="60"/></td>
      </tr>
      <tr id="editor" class="label">
        <td align="left" colspan="3">Page Content :
          <p id="container_htmlarea" <?php if($page_type=="dynamic") echo 'style="display:none;"';?>>
            <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $page_contents;
		$ctrl_name = 'page_content_static';
		$sBasePath = 'includes/fckeditor/';
		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "400px";
		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;
		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?>
          </p>
          <p id="container_txtarea" <?php if($page_type=="static") echo 'style="display:none;"';?>>
            <textarea name="page_content_dynamic" style="width:700px;height:300px;"><?=$page_contents?></textarea>
          </p></td>
      </tr>
      <tr>
        <td align="left" colspan="2">&nbsp;</td>
        <td align="left" valign="middle" height="40"><input name="submit" type="submit" value="Update Page" class="button" />
        </td>
      </tr>
    </table>
  </form>
</div>