<?php 
require_once("includes/classes/News.cls.php");
$newsObj = new News();
$res = $newsObj->getNewsLimit(6);
$total = $res['NO_OF_ITEMS'];
?><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$page_title?> | <?=PAGE_TITLE?></title>
<link href="<?=SITE_HOME?>css/ihm.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?=SITE_HOME?>common.js"></script>
</head>

<div class="innerDiv" id="calendar">
 <marquee align="absmiddle" direction="up" scrollamount="1" truespeed="truespeed" scrolldelay="30" onMouseOver="this.stop();" onMouseOut="this.start();" height="230">
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
		<li><span><?=$pdate?></span><a href="<?=$link?>" class="newslinkk13" target="_blank"><?=$title?></a>
		<?php if($new ==1){?><img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/><?php }?>
		</li>
		<?php }?>
		<?php if($type == 1){?>
		<li><span><?=$pdate?></span><a href="<?=SITE_HOME?>news-files/<?=$file_name?>" class="newslinkk13" target="_blank"><?=$title?></a>
		<?php if($new ==1){?><img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/><?php }?>
		</li>
		<?php }?>
		<?php if($type == 0){?>
		<li><span><?=$pdate?></span><a href="news.php?news=<?php print $url;?>" class="newslinkk13" ><?=$title?></a>
		<?php if($new ==1){?><img src="<?=SITE_HOME?>images/new.gif"  border="0" align="absmiddle"/><?php }?>
		</li>
		<?php }
		}
		?>
	
	  </ul>
</marquee>
</div>
<div align="right"><a href="<?=SITE_HOME?>news.php"><img src="<?=SITE_HOME?>images/read11.jpg" width="82" height="25" border="0" style="margin-right:10px;" /></a></div>
	