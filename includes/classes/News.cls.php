<?php
class News extends SiteData {
	public $file_type = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/bmp", "application/pdf", "application/doc", "application/docx", "application/xls", "application/xlsx"); 
	
	function getTotalPages() {
		$sql = "SELECT count(*) as total_pages from ".NEWS;
		$res = $this->getData($sql);
		return $res['oDATA'][0]['total_pages'];
	}
	function getAllNews($page=0, $orderby="id", $order="desc") {
		$sql = "SELECT * from ".NEWS." order by $orderby $order limit $page,".PAGE_LIMIT;	
		$res = $this->getData($sql);
		return $res;
	}
	function getNews() {
		$sql = "SELECT * from ".NEWS ." where status = '1'  order by id desc";	
		$res = $this->getData($sql);
		return $res;
	}
	function getNewsLimit($limit=6) {
		$limit= (int)$limit;
		$sql = "SELECT * from ".NEWS ." where status = '1'  order by id desc,sort_order asc LIMIT 0,$limit";	
		$res = $this->getData($sql);
		return $res;
	}
	function getAllActNews() {
		$sql = "SELECT * from ".NEWS ." where status = '1'  order by id desc,sort_order asc";	
		$res = $this->getData($sql);
		return $res;
	}
	function getNewsById($id) {
		$sql = "SELECT * from ".NEWS." where md5(id) = '$id'";
		$res = $this->getData($sql);
		return $res;
	}
	function getNewsByUrl($url) {
		$sql = "SELECT * from ".NEWS." where url = '$url' and  url != ''";
		
		$res = $this->getData($sql);
		return $res;
	}
	function addNews($request){ 
		extract($request); 
		$title = inText($title);
		if($type==0){$url = inText($url);}else{$url ="";}
		$publish_date = inText($publish_date);
		$expiry_date = inText($expiry_date);
		$link = ($_REQUEST['link']);
		if( isset($_FILES['file_name']['name']) && $_FILES['file_name']['name']!="" ) {
				$happenings = "news";
				$file_name = $this->upload($_FILES['file_name'],$happenings);
			}
		else {
				$file_name = "";
			}
		if($type==0){
			$sql = "SELECT url from ".NEWS." where url like '$url' and url!=''";
			$res = $this->getData($sql);
			if($res['NO_OF_ITEMS']>0) {
				$msg = 'URL Already Exists.';
				setMessage($msg, "error");
			}else{	
				if($title !="" and $publish_date != "" and $url != "")	{		
					$sql = "INSERT INTO ".NEWS." (type,title,publish_date,description,link,file_name,url)values('$type','$title','$publish_date','$description','$link','$file_name','$url')";
					$res = $this->inserttoDB($sql);
					$msg = 'News Added.';
					setMessage($msg, "correct");
				}else{
					$msg = 'News not added, Please try again with mandatory field.';
					setMessage($msg, "error");
				}
			}
		}else{
			if($title !="" and $publish_date != "")	{		
					$sql = "INSERT INTO ".NEWS." (type,title,publish_date,description,link,file_name,url)values('$type','$title','$publish_date','$description','$link','$file_name','$url')";
					$res = $this->inserttoDB($sql);
					$msg = 'News Added.';
					setMessage($msg, "correct");
				}else{
					$msg = 'News not added, Please try again with mandatory field.';
					setMessage($msg, "error");
				}
		}
		return $res;
	
	}
	function updateNews($request) {
		extract($request);
		$id = ($_REQUEST['id']);
		$type = ($_REQUEST['type']);
		$title = inText($_REQUEST['title']);
		if($type==0){$url = inText($url);}else{$url ="";}
		$publish_date = inText($_REQUEST['publish_date']);
		$file_type = $_FILES['file_name']['type'];
		if( isset($_FILES['file_name']['name']) && $_FILES['file_name']['name']!="" ) {
				$happenings = "news";
				$file_name = $this->upload($_FILES['file_name'],$happenings);
			}
		else {
				$file_name = "";
			}
		if($type==0){
			$sql = "SELECT url from ".NEWS." where url like '$url' and id!='$id' and url!=''";
			$res = $this->getData($sql);
			if($res['NO_OF_ITEMS']>0) {
				$msg = 'URL Already Exists.';
				setMessage($msg, "error");
			}else{
			if($url){
				if($file_name){
					$s = "select * from ".NEWS." WHERE id = $id";
					$res = $this->getData($s);
					$filename =$res['oDATA'][0]['file_name'];
					@unlink("../news-files/".$filename);
					
					$sql = "UPDATE ".NEWS." SET type='$type',title='$title',publish_date='$publish_date',description='$description',link='$link',file_name='$file_name',url='$url' where id='$id'";
					$res = $this->update($sql);
				}else{
					$sql = "UPDATE ".NEWS." SET type='$type',title='$title',publish_date='$publish_date',description='$description',link='$link',url='$url' where id='$id'";
					$res = $this->update($sql);
				}
				$msg = 'News Updated.';
				setMessage($msg, "correct");
				}else{
					$msg = 'News  not Updated, Please try again with mandatory field.';
					setMessage($msg, "error");
				}
			}
		}else{
			if($file_name){
					$s = "select * from ".NEWS." WHERE id = $id";
					$res = $this->getData($s);
					$filename =$res['oDATA'][0]['file_name'];
					@unlink("../news-files/".$filename);					
					$sql = "UPDATE ".NEWS." SET type='$type',title='$title',publish_date='$publish_date',description='$description',link='$link',file_name='$file_name',url='$url' where id='$id'";
					$res = $this->update($sql);
				}else{
					$sql = "UPDATE ".NEWS." SET type='$type',title='$title',publish_date='$publish_date',description='$description',link='$link',url='$url' where id='$id'";
					$res = $this->update($sql);
				}
				$msg = 'News Updated.';
				setMessage($msg, "correct");
		}
		
	}
	
	function disableStatus($id) {
		$id = inText($id);		
		$sql = "UPDATE ".NEWS." set status='0' where id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function enableStatus($id) {
		$id = inText($id);
		$sql = "UPDATE ".NEWS." set status='1' where id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function deleteNews($id) {
		$sql = "DELETE from ".NEWS." WHERE id = $id ";
		$s = "SELECT * from ".NEWS." WHERE id = $id";
		$res = $this->getData($s);
		$file_name =$res['oDATA'][0]['file_name'];
		@unlink("../news-files/".$file_name);
		$res = $this->deleterecord($sql);
		return $res;
	}
	
	function upload($files, $t_name) {
		$target_file_name = "";
		$file_type = $this->file_type; // access the public varible
		if( in_array($files["type"], $file_type) )	{
			$photo_name = $files["name"];
			$paths = pathinfo($photo_name);
			$ext = $paths['extension']; $fname = $paths['filename'];
			$tempFile = $files["tmp_name"];
			$time=mktime(date("d:m:Y H:i:s"));
			$target_file_name = $t_name."_".$time.".".$ext;
			$target_file_path = "../news-files/".$target_file_name;
			move_uploaded_file($tempFile, $target_file_path);			
		}
		return $target_file_name;
	}
	
}//END OF CLASS
?>
