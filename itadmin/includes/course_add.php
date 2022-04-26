<?php
if(isset($_POST['submit'])){
  $cdate=date('Y-m-d');
  $fields="menu_id='".$_POST['cType']."',title='".$_POST['cname']."',c_desc='".$_POST['cDesc']."',amount='".$_POST['cAmt']."',udate=now(),status='1'";
 $cDataInsert=$Dbqur->insertToDb("tbl_course",$fields);
 if($cDataInsert){
  echo "<script>alert('Data Saved Successfully.');</script>";
 }else{
  echo "<script>alert('Data not Saved.');</script>";
 }

}

 ?>

<div class="content_header">
  <div class="heading flleft">Add New Course</div>
  <div class="heading flright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
  <form name="frm" action="" method="post">
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="117" align="left" class="label">Course Type</td>
          <td width="8" align="center">:</td>
          <td align="left">
            <select name="cType" id="cType" required >
              <option value="">--Select--</option>
              <?php
              $id=2;
              $cData=$Dbqur->fetch_data("ihm_menus","menu_pid='$id'");
              foreach($cData as $cFdata){
               ?>
              <option value="<?=$cFdata['menu_id']?>"><?=$cFdata['menu_name']?></option>
             <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td align="left" class="label">Course Name</td>
          <td align="center" class="label">:</td>
          <td><input type="text" name="cname" size="40" value="" required /></td>
        </tr>
        <tr>
          <td align="left" class="label">Description</td>
          <td align="center">:</td>
          <td>
            <textarea name="cDesc" cols="40" rows="10" required ></textarea>
          </td>
        </tr>
        <tr>
          <td align="left" class="label">Course Amount</td>
          <td align="center" class="label">:</td>
          <td><input type="text" name="cAmt" size="40" value="" required /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="submit" value="Submit" class="button" /></td>
        </tr>
      </table>
    </div>
  </form>
</div>
