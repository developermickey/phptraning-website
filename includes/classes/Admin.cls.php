<?php
class Admin extends SiteData {	
	function checkLogin($request) {
	
		extract($request);	
		//echo $request;
		$uid = inText($uname);
		//echo $uid." name::::".$uname; 
		//echo $pass;
		$pwd = md5($pass);
		//echo "decrtpt Password is:".$pwd;
		//echo " Pass value".$pass;
//		echo " Request is: ".$request;
		
		//$pass1="8e0d2ec7527fa8186bac9c74c79714f0";
		
		
		//1d0258c2440a8d19e716292b231e3190
		//db8834197077287186e8c7524ca43d6f = vijaya
		//echo $pwd;
		$sql = "SELECT * from ".IHM_ADMIN." where admin_user='$uid' and admin_pass='$pwd' and admin_status='1'";
		//echo $sql;
		$res = $this->getData($sql);
		if($res['NO_OF_ITEMS']>0) {		
			$_SESSION[SES]['admin'] = $res['oDATA'][0];
			$id=$res['oDATA'][0]['admin_id'];		
			$login_date_time=date("d-m-Y h:i");
			$login_ip=$_SERVER['REMOTE_ADDR'];
			$sql="INSERT into ".IHM_ADMIN_LOGS." (login_id, login_uid, login_date_time, login_ip)
					values (null, '$id', '$login_date_time', '$login_ip')";
			$res = $this->inserttoDB($sql);
			$ret = 1;
		}
		else{
			$msg = "Invalid User/Password";
			setMessage($msg, 'error');
			$ret = 0;
		}
		return $ret;
	}
	function addAdmin($request) {
		extract($request);
		$uname=($uname);
		$sql = "SELECT * from ".IHM_ADMIN." where admin_user='$uname'";
		$res = $this->getData($sql);
		if($res['NO_OF_ITEMS']>0) {
			$msg="User Name already exist.";
			setMessage($msg,'error');
		}
		else{
			$name = inText($name);
			$uname = inText($uname);
			$pass=md5($pass);
			$email = inText($email);
			$phone = inText($phone);
			$admin_type = inText($admin_type);
			$admin_regdate = date("d-m-Y");
			$sql = "INSERT into ".IHM_ADMIN." (admin_id, admin_user, admin_pass, admin_name, admin_email, admin_phone, admin_type, admin_status, admin_regdate) VALUES (null, '$uname', '$pass', '$name', '$email', '$phone', '$admin_type', '1', '$admin_regdate')";
			$res = $this->inserttoDB($sql);
			$msg="New Administrator Created Successfully.";
			setMessage($msg, "correct");		
		}
	}
	function editAdmin($request) {
		extract($request);
		$id = inText($id);
		$name = inText ($name);
		$uname = inText ($uname);
		$email = inText ($email);
		$phone = inText ($phone);
		$sql = "UPDATE ".IHM_ADMIN." set admin_name='$name', admin_user='$uname', admin_email='$email', admin_phone='$phone' where md5(admin_id)='$id'";
		$res = $this->update($sql);
		$msg="Administrator Updated Successfully.";
		setMessage($msg, "correct");
	}
	function changeadminprofile($request) {
		extract($request);
		$id = inText($admin_id);
		$name = inText ($admin_name);
		$uname = inText ($admin_user);
		$email = inText ($admin_email);
		$phone = inText ($phone);
		$sql = "UPDATE ".IHM_ADMIN." set admin_name='$name', admin_user='$uname', admin_email='$email', admin_phone='$phone' where md5(admin_id)='$id'";
		$res = $this->update($sql);
		$msg="Administrator Updated Successfully.";
		setMessage($msg, "correct");
	}
	function getAdminUser() {
		$sql = "SELECT * from ".IHM_ADMIN." where admin_type='2' order by admin_id desc";
		$res = $this->getData($sql); 
		return $res;
	}
	function disableStatus($id) {
		$id = inText($id);		
		$sql = "UPDATE ".IHM_ADMIN." set admin_status='0' where admin_id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function enableStatus($id) {
		$id = inText($id);
		$sql = "UPDATE ".IHM_ADMIN." set admin_status='1' where admin_id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function changeAdminPass($request) {
		extract($request);
		$id = inText($id);
		$sql = "UPDATE ".IHM_ADMIN." set admin_pass='".md5($npass)."' where md5(admin_id)='$id'";
		$res = $this->update($sql);
		$msg="Password Change Successfull.";
		setMessage($msg,'correct');
	}	
	function deleteAdmin($id) {
		$id = inText($id);
		$sql = "DELETE from ".IHM_ADMIN." where admin_id='$id' and admin_user!='1'";
		$res = $this->deleterecord($sql);
		if($res['oDATA']==1) {		
			$msg="Administrator Account Deleted Successfully.";
			setMessage($msg,'correct');
		}
	}
	function getAdminUserById($id) {
		$id = inText($id);
		$sql = "SELECT * from ".IHM_ADMIN." where md5(admin_id)='$id'";
		$res = $this->getData($sql);
		return $res;
	}
		
	
	function changePass($request) {
		extract($request);
		$sql="select * from iit_admin where admin_id='$id' and admin_pass='".md5($opass)."'";
		$res = $this->getData($sql);		
		if($res['NO_OF_ITEMS']>=1) {
			$sql = "UPDATE iit_admin set admin_pass='".md5($npass)."' where admin_id='$id'";
			$res = $this->update($sql);
			$msg="Password Change Successfull.";
			setMessage($msg,'correct');	
			return true;
		}
		else {
			$msg="Invalid Current Password!";
			setMessage($msg,'error');		
			return false;
		}
	}
	
	
}
?>
