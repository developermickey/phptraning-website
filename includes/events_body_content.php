<div style="min-height:300px;">
<?php
//echo $res['NO_OF_ITEMS'];
if($events_res['NO_OF_ITEMS']>0) {
	$title = outText($events_res['oDATA'][0]['title']);
	$publish_date = outText($events_res['oDATA'][0]['publish_date']);
	$description = outText($events_res['oDATA'][0]['description']);
?>
<h1 class="homegray1"><?=$title?></h1>
<hr size="1px" color="#CCCCCC" />
<div align="justify">
  <?php if($description!=""){
		echo $description;
		}else{
		echo "&nbsp;";
		}
		?>
</div>
<div style="float:right; padding:5px;"><a href="<?=SITE_HOME?>events.php" title="Back"><img src="<?=SITE_HOME?>images/back.jpg" border="0"/></a></div>
<?php 
}else{
$res = $eventsObj->getAllActEvents();
$total = $res['NO_OF_ITEMS']; //echo $total;
if($total>0) {
?>
<h1 class="homegray1">Upcoming Events</h1>
<hr size="1px" color="#CCCCCC" />
<ul class="list03">
  <?php for($i=0;$i<$total;$i++){
	$id = ($res['oDATA'][$i]['id']);
	$type = stripslashes($res['oDATA'][$i]['type']);
	$title = stripslashes($res['oDATA'][$i]['title']);
	$url = stripslashes($res['oDATA'][$i]['url']);
	$publish_date = stripslashes($res['oDATA'][$i]['publish_date']);
	$pdate=date("d-m-Y",strtotime($publish_date));
	$link = ($res['oDATA'][$i]['link']);
	$file_name = ($res['oDATA'][$i]['file_name']);
	$new = $res['oDATA'][$i]['new'];
	?>
	
    <?php if($type == 2){?>
    <li><a href="<?=$link?>" target="_blank"><?=$title?></a>
	<?php if($new ==1){?><img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/><?php }?> 
   </li>
    <?php }?>
    <?php if($type == 1){?>
   <li> <a href="<?=SITE_HOME?>events/<?=$file_name?>" target="_blank"><?=$title?></a>
   <?php if($new ==1){?><img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/><?php }?>
   </li>
    <?php }?>
    <?php if($type == 0){?>
   <li><a href="<?=eventsUrl($url)?>"><?=$title?></a>
   <?php if($new ==1){?><img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/><?php }?></li>
    <?php }?>
	
  <?php }?>
  </ul>
<?php } 

}?>
</div>	
                