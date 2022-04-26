<?php 
require_once("includes/classes/Notification.cls.php");
$noticeObj = new Notification();
$res = $noticeObj->getNoticesLimt();
$total = $res['NO_OF_ITEMS'];
?>

<div class="innerDiv" id="calendar">
  <div style="margin: 2px 0 2px 0;">
    <marquee align="absmiddle" direction="up" scrollamount="1" truespeed="truespeed" scrolldelay="45" onMouseOver="this.stop();" onMouseOut="this.start();" height="150">
    <ul>
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
		if($type == 2){?>
      <li><a href="<?=$link?>" class="newslinkk12" target="_blank">
        <?=$title?>
        </a>
        <?php if($new ==1){?>
        <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
        <?php }?>
      </li>
      <?php }
		if($type == 1){?>
      <li><a href="<?=SITE_HOME?>notices-file/<?=$file_name?>" class="newslinkk12" target="_blank">
        <?=$title?>
        </a>
        <?php if($new ==1){?>
        <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
        <?php }?>
      </li>
      <?php }
		if($type == 0){?>
      <li><a href="notice-board.php?notice=<?php print $url; ?>" class="newslinkk12" >
        <?=$title?>
        </a>
        <?php if($new ==1){?>
        <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
        <?php }?>
      </li>
      <?php }
		}
		?>
    </ul>
    </marquee>
  </div>
</div>
<div align="right" style="padding-right:10px;margin-top:5px;"><a href="<?=SITE_HOME?>notice-board.php" class="newslinkk">Read Moe... </a></div>
