<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';
/*************************************/
if ($_POST['stage'] == 2) {
  
     if ($_FILES['img']['name'] != "") {
        $path2 = "../images/logo_client/";
        
        $s1 = rand();
        $realname = $_FILES['img']['name'];
        $realname = $s1 . "_" . $realname;
        $dest = $path2 . "/" . $realname;
	  
	    if(($_FILES['img']['type'] != "image/jpeg") && ($_FILES['img']['type'] != "img/png") && ($_FILES['image']['type'] != "img/jpg") && ($_FILES['img']['type'] != "img/PNG") && ($_FILES['img']['type'] != "image/JPG") && ($_FILES['img']['type'] != "img/JPEG") && ($_FILES['img']['type'] != "image/png")){
			die("Sorry!!! Invalid Image Format");
		}else{
			 	  move_uploaded_file($_FILES['img']['tmp_name'], $dest);
			 } 
	  
      
        $img_name = trim($realname);
        $img = $img_name;
    } 
  
  
	$title = mysql_real_escape_string($_POST['title']);
	$contents = mysql_real_escape_string($_POST['contents']);
	$name = mysql_real_escape_string($_POST['name']);
	$shortdesc = mysql_real_escape_string($_POST['shortdesc']);
	$shtdesc = substr($shortdesc,0,150);
	
	
	$sql="insert into tbl1_testimonial(title,logo,shortdesc,contents,Name) values('$title','$img','$shtdesc','$contents','$name')";

     //print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Added Successfully.";
    print "<script>";
    print "self.location = 'testimonial.php?msg=$msg';";
    print "</script>";
}
?>
<script type="text/javascript">
    function getAllSubcategory(cid){
        var url="product_add.php";
        if(cid!=''){
            self.location="product.php?q=add&cid="+cid;
        }else{
            self.location="product.php?q=add";
        }
    }
</script>
<div class="content_header">
  <div class="heading flleft">Add New Services</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
 <form  name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
   <?php
	if ($res['id'] == "") {
		?>
		<input type="hidden" name="stage" value="2">
		<?php
	} else {
		?>
		<input type="hidden" name="stage" value="3">
		<input type="hidden" name="id" value="<?php print $res['id'] ?>">
		<?php
	}
	?>
    <input type="hidden" name="act" value="addtravel">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
    
    
    <tr>
      <td align="left" class="label">Title</td>
      <td align="center">:</td>
      <td align="left"><input type="text" name="title" size="50" /></td>
    </tr>
      <tr>
      <td align="left" class="label">Upload Photo</td>
      <td align="center">:</td>
      <td align="left">
      <input type="file" name="img" id="img"/>
       
      </td>
      
    </tr>
    <tr>
      <td align="left" class="label">Short Description <?=$required?></td>
      <td align="center">:</td>
      <td align="left"><textarea id="txadesc" name="shortdesc" style="width:500px;height:100px;resize:none;" placeholder="Maximum 150 Characters"	></textarea></td>
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
		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	      ?>
       
          </p>
       </td>
      </tr>
    
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Add" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>