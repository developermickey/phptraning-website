<div style="min-height:300px;">
<?php

if($news_res['NO_OF_ITEMS']>0) {
	$title = outText($news_res['oDATA'][0]['title']);
	$publish_date = outText($news_res['oDATA'][0]['publish_date']);
	$description = outText($news_res['oDATA'][0]['description']);
?>
<div class="vh2">
<h2 class="homegray1"><?=$title?></h2>
</div>

<div align="justify">
  <?php if($description!=""){
		echo $description;
		}else{
		echo "&nbsp;";
		}
		?>
</div>
<div style="float:right; padding:5px;"><a href="<?=SITE_HOME?>news.php" title="Back"> <img src="img/goback.png" border="0"/></a></div>
<?php 
}else{
$res = $newsObj->getAllActNews();
$total = $res['NO_OF_ITEMS']; //echo $total;
if($total>0) {
?>
<div class="vh2">
<h2 class="homegray1" style="margin:0 ">Latest News</h2>
</div>

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
    <li><span style="font-weight:bold"><?=$publish_date?></span> <a href="<?=$link?>" target="_blank"><?=$title?></a> <?php if($new ==1){?> <img src="img/new.gif"  border="0" align="absmiddle"/> <?php   }?>
   </li>
    <?php }?>
    <?php
	
	
	 if($type == 1){?>
   <li><span style="font-weight:bold"><?=$publish_date?></span><a href="<?=SITE_HOME?>news-files/<?=$file_name?>" target="_blank">
   
   
   
<?=$title?></a> <?php if($new ==1){?> <img src="img/new.gif"  border="0" align="absmiddle"/> <?php   }?></li>
    <?php }?>
    <?php if($type == 0){?>
   <li><span style="font-weight:bold"><?=$publish_date?></span> <a href="news.php?news=<?php print $url;?>"><?=$title?></a> <?php if($new ==1){?><img src="img/new.gif"  border="0" align="absmiddle"/> <?php   }?></li>
    <?php }?>
	
  <?php }?>
  </ul>
<?php } 

}?>

</div>
					
                