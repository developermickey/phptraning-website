<?php
class Announcement extends SiteData {
	public $file_type = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/bmp", "application/pdf"); 
	
	function getTotalPages() {
		$sql = "SELECT count(*) as total_pages from ".ANNOUNCEMENT;
		$res = $this->getData($sql);
		return $res['oDATA'][0]['total_pages'];
	}
	function getAllAnnouncement($page=0, $orderby="id", $order="desc") {
		$sql = "SELECT * from ".ANNOUNCEMENT." order by $orderby $order limit $page,".PAGE_LIMIT;	
		$res = $this->getData($sql);
		return $res;
	}
	function getAnnoLimit($limit=6) {
		$limit= (int)$limit;
		$sql = "SELECT * from ".ANNOUNCEMENT ." where status = '1'  order by publish_date desc,sort_order asc LIMIT 0,$limit";	
		$res = $this->getData($sql);
		return $res;
	}
	function getAllActAnnouncement() {
		$sql = "SELECT *, str_to_date(publish_date,'%d-%m-%Y') AS p_date FROM ".ANNOUNCEMENT." where status='1' ORDER BY sort_order ASC, p_date DESC";	
		$res = $this->getData($sql);
		return $res;
	}
	function getAnnouncementLimit($limit) {
		$sql = "SELECT *, str_to_date(publish_date,'%d-%m-%Y') as p_date from ".ANNOUNCEMENT." where status = '1' order by p_date desc,sort_order asc LIMIT 0,$limit";	
		$res = $this->getData($sql);
		return $res;
	}
	function getAnnouncementById($id) {
		$sql = "SELECT * from ".ANNOUNCEMENT." where md5(id) = '$id'";
		$res = $this->getData($sql);
		return $res;
	}
	function getAnnouncementByUrl($url) {
		$sql = "SELECT * from ".ANNOUNCEMENT." where url = '$url'";
		$res = $this->getData($sql);
		return $res;
	}
	function addAnnouncement($request){ 
		extract($request); 
		$title = inText($title);
		$url = inText($url);
		$publish_date = inText($publish_date);
		$expiry_date = inText($expiry_date);
		$link = ($_REQUEST['link']);
		if( isset($_FILES['file_name']['name']) && $_FILES['file_name']['name']!="" ) {
				$announcement = "announcement";
				$file_name = $this->upload($_FILES['file_name'],$announcement);
		}
		else {
				$file_name = "";
		}
		$sql = "SELECT url from ".ANNOUNCEMENT." where url like '$url'";
		$res = $this->getData($sql);
		if($res['NO_OF_ITEMS']>0) {
			$msg = 'URL Already Exists.';
			setMessage($msg, "error");
		}else{	
			if($title !="" and $publish_date != "")	{		
				$sql = "INSERT INTO ".ANNOUNCEMENT." (type,title,publish_date,description,link,file_name,url)values('$type','$title','$publish_date','$description','$link','$file_name','$url')";
				$res = $this->inserttoDB($sql);
				$msg = 'Announcement Added.';
				setMessage($msg, "correct");
			}else{
				$msg = 'Announcement not added, Please try again with mandatory field.';
				setMessage($msg, "error");
			}
		}
		return $res;	
	}
	function updateAnnouncement($request) {
		extract($request);
		$id = ($_REQUEST['id']);
		$type = ($_REQUEST['type']);
		$title = inText($_REQUEST['title']);
		$url = inText($url);
		$publish_date = inText($_REQUEST['publish_date']);
		$file_type = $_FILES['file_name']['type'];
		if( isset($_FILES['file_name']['name']) && $_FILES['file_name']['name']!="" ) {
				$announcement = "announcement";
				$file_name = $this->upload($_FILES['file_name'],$announcement);
			}
		else {
				$file_name = "";
			}
		$sql = "SELECT url from ".ANNOUNCEMENT." where url like '$url' and id!='$id'";
		$res = $this->getData($sql);
		if($res['NO_OF_ITEMS']>0) {
			$msg = 'URL Already Exists.';
			setMessage($msg, "error");
		}else{
			if($file_name){
				$s = "select * from ".ANNOUNCEMENT." WHERE id = $id";
				$res = $this->getData($s);
				$filename =$res['oDATA'][0]['file_name'];
				@unlink("../announcement/".$filename);				
				$sql = "UPDATE ".ANNOUNCEMENT." SET type='$type',title='$title',publish_date='$publish_date',description='$description',link='$link',file_name='$file_name',url='$url' where id='$id'";
				$res = $this->update($sql);
			}else{
				$sql = "UPDATE ".ANNOUNCEMENT." SET type='$type',title='$title',publish_date='$publish_date',description='$description',link='$link',url='$url' where id='$id'";
				$res = $this->update($sql);
			}
			$msg = 'Announcement Updated.';
			setMessage($msg, "correct");
		}		
	}	
	function disableStatus($id) {
		$id = inText($id);		
		$sql = "UPDATE ".ANNOUNCEMENT." set status='0' where id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function enableStatus($id) {
		$id = inText($id);
		$sql = "UPDATE ".ANNOUNCEMENT." set status='1' where id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function deleteAnnouncement($id) {
		$sql = "DELETE from ".ANNOUNCEMENT." WHERE id = $id ";
		$s = "SELECT * from ".ANNOUNCEMENT." WHERE id = $id";
		$res = $this->getData($s);
		$file_name =$res['oDATA'][0]['file_name'];
		@unlink("../announcement/".$file_name);
		$res = $this->deleterecord($sql);
		$msg="Data deleted Successfully.";
		setMessage($msg, "correct");
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
			$target_file_path = "../announcement/".$target_file_name;
			move_uploaded_file($tempFile, $target_file_path);			
		}
		return $target_file_name;
	}	
}//END OF CLASS
?>
