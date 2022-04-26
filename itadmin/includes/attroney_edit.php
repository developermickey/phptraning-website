<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();

/*************************************/
$id=$_GET['id'];
$bquery=mysql_query("select * from tbl_attorney where id='$id'");
$brow=mysql_fetch_array($bquery);
if ($_POST['act'] == 'editclient') {
    $date = date("Y-m-d", strtotime($_POST['dob']));
    if ($_FILES['img']['name'] != "") {
        $path2 = "../images/logo_client/";
        $delpath = $path2 . "/" . $_POST['T2'];

        @unlink($delpath);
		
        $s1 = rand();
        $realname = $_FILES['img']['name'];
        $realname = $s1 . "_" . $realname;
        $dest = $path2 . "/" . $realname;
	  
	  if(($_FILES['img']['type'] != "image/jpeg") && ($_FILES['img']['type'] != "img/png") && ($_FILES['image']['type'] != "img/jpg") && ($_FILES['img']['type'] != "img/PNG") && ($_FILES['img']['type'] != "image/JPG")&& ($_FILES['img']['type'] != "image/png") && ($_FILES['img']['type'] != "img/JPEG")){
			die("Sorry!!! Invalid Image Format");
		}else{
			 	 move_uploaded_file($_FILES['img']['tmp_name'], $dest);
			 } 
	  
	  
       
        $img_name = trim($realname);
        $img = $img_name;
    }else{
		$img = $_REQUEST['T2'];
	} 
	//GET DATA
	
	$client_name = mysql_real_escape_string($_REQUEST['client_name']);
	$contents = mysql_real_escape_string($_REQUEST['contents']);
		
	$dt = date('Y-m-d');
	
    $sql = "UPDATE `tbl_attorney` SET `client_name`='$client_name',`logo`='$img',`contents`='$contents',`update_date`='$dt' WHERE id='$_REQUEST[upd_id]'";

    // print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Updated Successfully.";
    print "<script>";
    print "self.location = 'manage_Attorney.php?msg=$msg';";
    print "</script>";
}

?>

<div class="content_header">
  <div class="heading flleft">Edit Trainer</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form  name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
   	<input type="hidden" name="upd_id" value="<?php echo $id;?>" />
    <input type="hidden" name="act" value="editclient">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
   	
    <tr>
      <td align="left" class="label">Trainer Name <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><input type="text" value="<?php echo $brow['client_name'];?>" name="client_name" size="50" /></td>
    </tr>
    
    <tr>
      <td align="left" class="label">Upload Photo</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" id="img"/>
      <input type="hidden" name="T2" value="<?php echo $brow['logo'];?>" /><img height="100" width="100" src="../images/logo_client/<?php echo $brow['logo'];?>" />
      </td>
      </tr>
      
    
    
    <tr>
    <td colspan="3">Note:Please Upload the Image  of width=350 Pixel and height=450 Pixel</td>
    
    </tr>
	
    
    <tr id="editor" class="label">
        <td align="left" colspan="3">Description :
		<p id="container_htmlarea" <?php if(isset($pdata['page_type']) && $pdata['page_type']=="dynamic") echo 'style="display:none;"';?>>
            <?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = $page_contents;
		$ctrl_name = 'contents';
		$sBasePath = 'includes/fckeditor/';
		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "400px";
		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;
		$oFCKeditor->Value =$brow['contents'];
		$oFCKeditor->Create();
	      ?>
          </p>
       </td>
      </tr>
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Update Trainer" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>