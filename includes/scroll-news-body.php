<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8" valign="top"><img src="images/body-left.jpg" width="8" height="161" /></td>
    <td valign="top" style="background-image:url(images/body-middle.jpg); background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="220" align="left" valign="top">
				<?php include("includes/quicklinks.php"); ?>
				  </td>
                <td width="1" valign="top" background="images/linu.jpg"></td>
                <td width="22" valign="top">&nbsp;</td>
                <td valign="top"><div style="padding-top: 10px;">
                    
					<?php
$purl = filter($_REQUEST['news']);
$res = $snewsObj->getNewsByUrl($purl);
if($res['NO_OF_ITEMS']>0) {
	$title = outText($res['oDATA'][0]['title']);
	$publish_date = outText($res['oDATA'][0]['publish_date']);
	$description = outText($res['oDATA'][0]['description']);
?>
<h1 class="titlee fleft"><?=$title?></h1>
<div class="fright"></div>
<div class="clear"></div>
<hr size="1px;" color="#CCCCCC" />
<div class="clear">
<div><i>Published on <?=$publish_date?></i></div>
<div align="justify">
  <?php if($description!=""){
		echo $description;
		}else{
		echo "&nbsp;";
		}
		?>
</div>
</div>
<?php 
}else{
$res = $newsObj->getAllActNews();
$total = $res['NO_OF_ITEMS'];
if($res['NO_OF_ITEMS']>0) {
?>
<h1 class="titlee">News</h1>
<hr size="1px;" color="#CCCCCC" />
<ul class="list01">
  <?php for($i=0;$i<$total;$i++){
	$id = ($res['oDATA'][$i]['id']);
	$type = outText($res['oDATA'][$i]['type']);
	$title = outText($res['oDATA'][$i]['title']);
	$url = outText($res['oDATA'][$i]['url']);
	$publish_date = outText($res['oDATA'][$i]['publish_date']);
	$pdate=date("d M, Y",strtotime($publish_date));
	$link = ($res['oDATA'][$i]['link']);
	$venue = ($res['oDATA'][$i]['venue']);
	$file_name = ($res['oDATA'][$i]['file_name']);
	?>
  <li>
    <?php if($type == 2){?>
    <span class="date"><?=$publish_date?></span> <a href="<?=$link?>" target="_blank" class="newslinkk">
    <?=$title?>
    </a>
    <?php }?>
    <?php if($type == 1){?>
    <span class="date"><?=$publish_date?></span> <a href="documents/<?=$file_name?>" target="_blank" class="newslinkk">
    <?=$title?>
    </a>
    <?php }?>
    <?php if($type == 0){?>
    <span class="date"><?=$publish_date?></span> <a href="news.php?news=<?=$url?>">
    <?=$title?>
    </a>
    <?php }?>
  </li>
  <?php }?>
</ul>
<?php } 

}?>

					</div>
					
                  </div></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width="8" valign="top"><img src="images/body-right.jpg" width="8" height="161" /></td>
  </tr>
</table>