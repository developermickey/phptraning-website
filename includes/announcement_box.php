<?php 
require_once("includes/classes/Announcement.cls.php");
$announcementObj = new Announcement();
$res = $announcementObj->getAnnouncementLimit(5);
$total = $res['NO_OF_ITEMS'];
?>

<ul class="list02">
  <?php
	for($i=0;$i<$total;$i++){
		$id = ($res['oDATA'][$i]['id']);
		$type = outText($res['oDATA'][$i]['type']);
		$title = outText($res['oDATA'][$i]['title']);
		$url = outText($res['oDATA'][$i]['url']);
		$publish_date = outText($res['oDATA'][$i]['publish_date']);
		$pdate=date("d.m.Y",strtotime($publish_date));
		$link = ($res['oDATA'][$i]['link']);
		$venue = ($res['oDATA'][$i]['venue']);
		$file_name = ($res['oDATA'][$i]['file_name']); 
		$new = $res['oDATA'][$i]['new'];
		?>
  <?php if($type == 2){?>
  <li><a href="<?=$link?>" class="newslinkk12" target="_blank">
    <?=$title?>
    </a></li>
  <?php if($new ==1){?>
  <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
  <?php }?>
  <?php }?>
  <?php if($type == 1){?>
  <li><a href="<?=SITE_HOME?>announcement/<?=$file_name?>" class="newslinkk12" target="_blank">
    <?=$title?>
    </a>
    <?php if($new ==1){?>
    <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
    <?php }?>
  </li>
  <?php }?>
  <?php if($type == 0){?>
  <li><a href="<?=SITE_HOME?>announcement.php?announcement=<?php print $url;?>" class="newslinkk12" >
    <?=$title?>
    </a>
    <?php if($new ==1){?>
    <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
    <?php }?>
  </li>
  <hr color="#CCCCCC" size="1" />
  <?php }?>
  <?php }
		?>

                             
</ul>
<div align="right" style="padding-right:10px;margin-top:5px;"><a href="<?=SITE_HOME?>announcement.php" class="newslinkk">More Announcement... </a></div>
