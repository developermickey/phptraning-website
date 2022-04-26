<?php 
require_once("includes/classes/Events.cls.php");
$eventsObj = new Events();
$res = $eventsObj->getEventsLimit(5);
$total = $res['NO_OF_ITEMS'];
?>

<div class="innerDiv" id="calendar">
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
		?>
    <?php if($type == 2){?>
    <li><a href="<?=$link?>" class="newslinkk12" target="_blank">
      <?=$title?>
      </a>
      <?php if($new ==1){?>
      <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
      <?php }?>
    </li>
    <?php }?>
    <?php if($type == 1){?>
    <li><b><a href="<?=SITE_HOME?>events/<?=$file_name?>" class="newslinkk12" target="_blank">
      <?=$title?>
      </a></b>
      <?php if($new ==1){?>
      <img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/>
      <?php }?>
    </li>
    <?php }?>
    <?php if($type == 0){?>
    <li><a href="<?=eventsUrl($url)?>" class="newslinkk12" >
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
</div>
