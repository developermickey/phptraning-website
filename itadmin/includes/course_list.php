<?php

if($_GET['value']=='del'){
  $id=$_GET['cid'];
  $cDelete=$Dbqur->delete("tbl_course","","id='$id'");
  if($cDelete){
    echo "<script>alert('Data Deleted Successfully.');</script>";
    echo "<script>window.location='course-manager.php'</script>";
  }
  else{
    echo "<script>alert('Data is not Deleted.');</script>";
  }
}

if($_GET['value']=='enb'){

   $id=$_GET['cid'];
  $cDelete=$Dbqur->updateToDb("tbl_course","status=0","id='$id'");
  if($cDelete){
    echo "<script>alert('Course Disabled Successfully.');</script>";
    echo "<script>window.location='course-manager.php'</script>";
  }
  else{
    echo "<script>alert('Course is not Disabled.');</script>";
  }

}

if($_GET['value']=='dis'){

   $id=$_GET['cid'];
  $cDelete=$Dbqur->updateToDb("tbl_course","status=1","id='$id'");
  if($cDelete){
    echo "<script>alert('Course enabled Successfully.');</script>";
    echo "<script>window.location='course-manager.php'</script>";
  }
  else{
    echo "<script>alert('Course is not enabled.');</script>";
  }

}

 ?>

<div class="content_header">
  <div class="heading flleft">Course Manager </div>
  <div class="heading flright"><a href="course-manager.php?q=add">Add New Course</a></div>
  <!-- <div class="heading flright"><a href="course-manager.php?q=addType">Add Course Type</a></div> -->

  
  <div class="clear"></div>
</div>
<div class="bodycontent">
 
  <table width="99%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" align="center" class="datagrid">
    <tr>
      <th width="5%">S.N.</th>
      <th width="10%">Title</th>
      <th width="15%">Course Name</th>
      <th width="25%">Description</th>
      <th width="10%" colspan="3">Actions</th>
    </tr>
    <?php
      $i=1;
      $id=1;
      $cData=$Dbqur->fetch_data("tbl_course");
      foreach($cData as $cFdata){
        $cid=$cFdata['id'];
        $mid=$cFdata['menu_id'];
        $menuData=$Dbqur->fetchSingle("ihm_menus","menu_name","menu_id='$mid'");
     ?>
    <tr>
      <td><?=$i++;?></td>
      <td><?=$menuData['menu_name']?></td>
      <td><?=$cFdata['title']?></td>
      <td><?=$cFdata['c_desc']?></td>
      <td><a href="<?=$_curpage?>?q=edit&id=<?=$cid?>"><img src="images/edit.png" border="0" alt="Enable" title="Click to Edit"/></a></td>
      <td>
        <?php if($cFdata['status']){ ?>
        <a href="course-manager.php?value=enb&cid=<?=$cid?>"><img src="images/enable.png" border="0" alt="Enable" title="Click to Disable"/></a>
        <?php } else{ ?>
        <a href="course-manager.php?value=dis&cid=<?=$cid?>"><img src="images/disable.png" border="0" alt="Disable" title="Click to Enable"/></a>
        <?php } ?>
      </td>
      <td><a href="course-manager.php?value=del&cid=<?=$cid?>"><img src="images/delete.png" border="0" alt="Enable" title="Click to Delete"/></a></td>
    </tr>
   <?php } ?>
  
  </table>
</div>
