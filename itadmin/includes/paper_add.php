<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$fdata = array();
$special_id = isset($_GET['special_id']) ? $_GET['special_id'] : '';
$sid = isset($_GET['sid']) ? $_GET['sid'] : '';
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';

/*************************************/
if ($_POST['stage'] == 2) {
    
    if ($_FILES['file1']['name'] != "") {
        $path2 = "../paperfile";
        $delpath = $path2 . "/" . $_POST['T2'];

        @unlink($delpath);

        $s1 = rand();
        $realname = $_FILES['file1']['name'];
        $realname = $s1 . "_" . $realname;
        $dest = $path2 . "/" . $realname;
        move_uploaded_file($_FILES['file1']['tmp_name'], $dest);
        $img_name = trim($realname);
        $img = $img_name;
    } else {
        $img = trim($_POST['T2']);
    }
    /*$sql = "insert into tbl_paper set 
		year	=   '" . str_replace("'", "&#39;", $_POST['year']) . "',          
		title	=	'" . str_replace("'", "&#39;", $_POST['title']) . "',
		auther1	=	'" . str_replace("'", "&#39;", $_POST['auther1']) . "',
		auther2	=	'" . str_replace("'", "&#39;", $_POST['auther2']) . "',
		auther3	=	'" . str_replace("'", "&#39;", $_POST['auther3']) . "',
		auther4	=	'" . str_replace("'", "&#39;", $_POST['auther4']) . "',
		auther5	=	'" . str_replace("'", "&#39;", $_POST['auther5']) . "',
		barea	=	'" . str_replace("'", "&#39;", $_POST['barea']) . "',
		abstract=	'" . str_replace("'", "&#39;", $_POST['abstract']) . "',
		kayword	=	'" . str_replace("'", "&#39;", $_POST['keyword']) . "',
		desc	=	'" . str_replace("'", "&#39;", $_POST['description']) . "',
		file	=	'" . str_replace("'", "&#39;", '$img' ) . "',
		ref		=	'" . str_replace("'", "&#39;", $_POST['reference']) . "',
		created_date=	'" . str_replace("'", "&#39;", $date) . "'";*/
		$year =mysql_real_escape_string($_POST['year']);
		$month =mysql_real_escape_string($_POST['month']);
		
		$title =mysql_real_escape_string($_POST['title']);
		$auther1 =mysql_real_escape_string($_POST['auther1']);
		$shtdesc = substr($auther1,0,150);
		$auther2 =mysql_real_escape_string($_POST['auther2']);
		$auther3 =mysql_real_escape_string($_POST['auther3']);
		$auther4 =mysql_real_escape_string($_POST['auther4']);
		$auther5 =mysql_real_escape_string($_POST['auther5']);
		$barea =mysql_real_escape_string($_POST['barea']);
		$abstract =mysql_real_escape_string($_POST['abstract']);
		$kayword =mysql_real_escape_string($_POST['keyword']);
		$desc =mysql_real_escape_string($_POST['description']);
		$ref =mysql_real_escape_string($_POST['reference']);
		$date = date("Y-m-d");
		
	$sql = "INSERT INTO tbl_paper(`year`,`month`, `title`, `auther1`, `auther2`, `auther3`, `auther4`, `auther5`, `barea`, `abstract`, `kayword`, `desc`, `file`, `ref`, `created_date`) VALUES ('$year','$month', '$title', '$shtdesc', '$auther2', '$auther3', '$auther4', '$auther5', '$barea', '$abstract', '$kayword', '$desc', '$img', '$ref', '$date')";
		

     //print $sql;exit;
    $rs = mysql_query($sql);
    $msg = "Record Added Successfully.";
    print "<script>";
    print "self.location = 'managepaper.php?msg=$msg';";
    print "</script>";
}
?>
<div class="content_header">
  <div class="heading flleft">Add New Case</div>
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
    <input type="hidden" name="act" value="addfaculty">
	<div id="validation_div" class="validation_error"></div>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" align="center">
    <tr>
      <td width="11%" align="left" class="label">Year <?=$required?></td>
      <td width="2%" align="center">:</td>
      <td width="87%" align="left"><input type="text" name="year" value="<?=$fdata['year']?>" size="50" onkeypress="javascript:return isNumber(event)" /></td>
    </tr>
    <tr>
      <td width="15%" align="left" class="label">Case Study <?=$required?></td>
      <td width="2%" align="center">:</td>
      <td width="87%" align="left"><input type="text" name="month" value="<?=$fdata['month']?>" placeholder="Example: Alimony, Spouse support, Etc." size="50" /></td>
    </tr>
    <tr>
      <td width="11%" align="left" class="label">Case Heading <?=$required?></td>
      <td width="2%" align="center">:</td>
      <td width="87%" align="left"><input type="text" name="title" value="<?=$fdata['title']?>" size="50" /></td>
    </tr>
    <tr>
      <td width="11%" align="left" class="label">Short Description <?=$required?></td>
      <td width="2%" align="center">:</td>
      <td width="87%" align="left"><textarea name="auther1"  placeholder="Maximum 150 Charaters"  cols="55" rows="5" /><?=$fdata['auther1']?></textarea></td>
    </tr>
   
    <tr id="editor1" class="label">
      <td colspan="3" align="left">Content <?=$required?>
       <p id="container_htmlarea" <?php if(isset($pdata['page_type']) && $pdata['page_type']=="dynamic") echo 'style="display:none;"';?>>
            <?php
			include_once("includes/fckeditor/fckeditor.php") ;
			echo "\n";
			$cntdesc = $page_contents;
			$ctrl_name = 'abstract';
			$sBasePath = 'includes/fckeditor/';
			$oFCKeditor = new FCKeditor($ctrl_name);
			$oFCKeditor->Height = "400px";
			$oFCKeditor->Width = "100%";
			$oFCKeditor->BasePath = $sBasePath;
			$oFCKeditor->Value =$cntdesc;
			$oFCKeditor->Create();
		 ?>
          </p>
          <p id="container_txtarea" <?php if( !isset($pdata['page_type']) || (isset($pdata['page_type']) && $pdata['page_type']=="static") )  echo 'style="display:none;"';?>>
            <textarea name="page_content_dynamic" style="width:700px;height:300px;"><?=$page_contents?></textarea>
          </p></td>
    </tr>
    
    <tr>
      <td colspan="3" align="center"><p><INPUT type="submit" value="Submit" class="button" /></p></td>
    </tr>
	</table>
  </form>
</div>