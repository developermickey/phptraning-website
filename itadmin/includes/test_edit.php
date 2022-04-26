<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();
$id = $_GET['id'];

/* * ********************************** */

$cquery = mysql_query("select * from tbl1_testimonial where id='$id'");
$row = mysql_fetch_array($cquery);
$cid = isset($_GET['cid']) ? $_GET['cid'] :$row['cat_id'];
if ($_POST['stage'] == 3) {
//print "<pre>";print_r ($_POST); print "</pre>";exit();
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
	
	
	$title = mysql_real_escape_string($_POST['title']);
	$contents = mysql_real_escape_string($_POST['contents']);
	$name = mysql_real_escape_string($_POST['name']);
	$shortdesc = mysql_real_escape_string($_POST['shortdesc']);
	$shtdesc = substr($shortdesc,0,150);
	
	 $sql = "update tbl1_testimonial set
			title='$title',
			logo='$img',
			shortdesc='$shtdesc',
			contents='$contents',
			Name='$name'
			where id='$id'";
    //print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Updated Successfully.";
    print "<script>";
    print "self.location = 'testimonial.php?msg=$msg';";
    print "</script>";
}
?>
<script type="text/javascript">
    function getAllSubcategory(cid){
        var url="product_add.php";
        if(cid!=''){
            self.location="product_edit.php?q=edit&cid="+cid;
        }else{
            self.location="product_edit.php?q=edit";
        }
    }
</script> 
<div class="content_header">
    <div class="heading flleft">Edit Services</div>
    <div class="heading flright"><a href="<?= $_curpage ?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
    <form  name="form1" method="post" action=""  onsubmit="return validate();" enctype="multipart/form-data">
        <?php
        if ($row['id'] == "") {
            ?>
            <input type="hidden" name="stage" value="2">
            <?php
        } else {
            ?>
            <input type="hidden" name="stage" value="3">
            <input type="hidden" name="id" value="<?php print $row['id'] ?>">
            <?php
        }
        ?>
        <input type="hidden" name="act" value="edittravel">
        <div id="validation_div" class="validation_error"></div>
        <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
    
    
    <tr>
      <td align="left" class="label">Title</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="title" value="<?php  echo $row['title'];?>" size="50" /></td>
    </tr>
   
    <tr>
      <td align="left" class="label">Upload Photo</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" id="img"/>
      <input type="hidden" name="T2" value="<?php echo $row['logo'];?>" />
     <?php 
	   if($row['logo']!='') {
      ?>
      <img height="100" width="100" src="../images/logo_client/<?php echo $row['logo'];?>" />
	  <?php
	  }?>
      </td>
      </tr>
      <tr>
      <td align="left" class="label">Short Description <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><textarea id="txadesc" name="shortdesc" style="width:500px;height:100px;resize:none;" placeholder="Maximum 150 Characters "	><?php  echo $row['shortdesc'];?></textarea></td>
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
		$oFCKeditor->Value =$row['contents'];
		$oFCKeditor->Create();
	      ?>
          </p>
       </td>
      </tr>
   
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="update" class="button" /></p></td>
    </tr>
	</table>
    </form>
</div>