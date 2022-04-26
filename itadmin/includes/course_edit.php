<?php
  if($_GET['id']){
   $cid=$_GET['id'];
  $cEdit=$Dbqur->fetch_data("tbl_course","id='$cid'");
  }

if(isset($_POST['update'])){

 $courseId=$_POST['id'];
 $fields="menu_id='".$_POST['cType']."',title='".$_POST['cname']."',c_desc='".$_POST['cDesc']."',amount='".$_POST['cAmt']."',udate=now()";
  $cDataUpdate=$Dbqur->updateToDb("tbl_course",$fields,"id='$courseId'");
  if($cDataUpdate){
    echo "<script>alert('Data Updated Successfully.');</script>";
    echo "<script>window.location='course-manager.php'</script>";
   }else{
    echo "<script>alert('Data not Updated.');</script>";
   }
}
?>
<div class="content_header">
  <div class="heading flleft">Edit Course</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <div id="validation_div" class="validation_error"></div>
  <form name="frm" action="" method="post">
    <input type="hidden" name="act" value="editadmin" />
    <input type="hidden" name="id" value="<?=$cEdit[0]['id']?>" />
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="117" align="left" class="label">Course Type</td>
          <td width="8" align="center">:</td>
          <td align="left">
            <select name="cType" id="cType">
              <option value="">--Select--</option>
              <?php
              $id=2;
              $cData=$Dbqur->fetch_data("ihm_menus","menu_pid='$id'");
              foreach($cData as $cFdata){
               ?>
              <option value="<?=$cFdata['menu_id']?>" <?php if($cEdit[0]['menu_id']==$cFdata['menu_id']){echo "selected";} ?>><?=$cFdata['menu_name']?></option>
             <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td align="left" class="label">Course Name</td>
          <td align="center" class="label">:</td>
          <td><input type="text" name="cname" size="40" value="<?=$cEdit[0]['title']?>" required /></td>
        </tr>
        <tr>
          <td align="left" class="label">Description</td>
          <td align="center">:</td>
          <td>
            <textarea name="cDesc" cols="40" required rows="10"><?=$cEdit[0]['c_desc']?></textarea>
          </td>
        </tr>
        <tr>
          <td align="left" class="label">Course Amount</td>
          <td align="center" class="label">:</td>
          <td><input type="text" name="cAmt" size="40" value="<?=$cEdit[0]['amount']?>" required /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="update" value="Update" class="button" /></td>
        </tr>
      </table>
    </div>
  </form>
</div>
