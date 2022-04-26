<div style="min-height:300px;">
			 <?php
				if($res_pho['NO_OF_ITEMS']>0) {
				?>
				<span style="float:right;"></span>
				 <h1 class="homegray1"><?=outText($res_pho['oDATA'][0]['category_name']);?></h1>
				 <hr size="1px" color="#CCCCCC" />
				<span style="color:#999999; font-style:italic;">Click on the images to view an enlarged version.</span>
				<div style="float:right;"><a href="<?=SITE_HOME?>photogallery.php" title="Back"><img src="<?=SITE_HOME?>images/go-back-btn.png" border="0"/></a></div>
				<br />
				<div id="catagory_gallery">
				<ul class="photos" id="photogallery">
				<?php
				 for($i=0;$i<$res_pho['NO_OF_ITEMS'];$i++){
					$category_id = cleanInput($res_pho['oDATA'][$i]['category_id']);
					$category_name = outText($res_pho['oDATA'][$i]['category_name']);
					$category_url = outText($res_pho['oDATA'][$i]['category_url']);
					$photo_caption = outText($res_pho['oDATA'][$i]['photo_caption']);
					$photo_file = outText($res_pho['oDATA'][$i]['photo_file']);
					?>
					<li>
						<?php if($photo_file){?><a href="<?=SITE_HOME?>photo/<?=$photo_file;?>"  rel="lightbox[slide]"
	title="<?php echo $photo_caption;?>"><img src='<?=SITE_HOME?>cropeImage.php?h=100&w=134&f=photo/<?php 
	echo $photo_file;?>' alt="<?= $photo_caption;?>"  style="border:2px solid #CCCCCC;"/></a>
							<?php }?>
						</li>
				<?php  }
				?>
				</ul>
				</div>
				<?php
				}
				else{
				 $res_cat = $phoObj->getCategory();
				 $total_cat = $res_cat['NO_OF_ITEMS'];
				 if($res_cat['NO_OF_ITEMS']>0) {
				 ?>
				 <h1 class="h1">Photo Gallery </h1>
				 <span style="color:#999999; font-style:italic;">Click on the images to view catagory images.</span>
				<div id="catagory" align="left">
						<ul>
				        <div align="center">
				          <?php
				 for($i=0;$i<$total_cat;$i++){
					$category_id = cleanInput($res_cat['oDATA'][$i]['category_id']);
					$category_name = outText($res_cat['oDATA'][$i]['category_name']);
					$category_url = outText($res_cat['oDATA'][$i]['category_url']);
					
					$sql="SELECT * from ".PHOTO_GALLERYS." where photo_category='$category_id' order by photo_id desc limit 0,1";
					$pdata = $db->getData($sql);
					
					$photo_caption = outText($pdata['oDATA'][0]['photo_caption']);
					$photo_file = outText($pdata['oDATA'][0]['photo_file']);
					
					$sql1="SELECT count(*) as total_pages from ".PHOTO_GALLERYS." where photo_category='$category_id'";
					$res1 = $db->getData($sql1);
					$total_photo = $res1['oDATA'][0]['total_pages'];
					
					if($photo_file){
					 
					?>
				          </div>
				        <li>
                       
						  <div align="left"><a href="photogallery.php?page=<?= $category_url?>"><img src="<?=SITE_HOME?>photo/<?=$photo_file;?>"  alt="<?= $photo_caption;?>" title="<?=$photo_caption;?>" width="150" height="100"/></a></div>
						  <div class="category_div">
						  <div align="center"><b>
					      <?=$category_name;?>
						    </b><br />
						      <i>(
					          <?=$total_photo?> 
					          photos)</i>
					        </div>
						</div>
						</li>
						<div align="center">
						  <?php }
					}?>
						      </div>
				  </ul>
					</div>
			 <?php } 
			 
			 }?>
</div>