<?php
class dbquery extends SiteData {	
	
	function exeCute($qry){
		$sql_query = mysql_query($qry);
		while($data = mysql_fetch_array($sql_query)){
			$res_data[] = $data; 
		}
		return $res_data;
	}	
	function fetch_data($tbl_nm,$condition="",$order="",$limit=""){
		 $select = "SELECT * FROM ".$tbl_nm;
		if($condition!=""){
			$select .= " WHERE ".$condition;
		}
		if($order!=""){
			$select .= " ORDER BY ".$order;
		}
		if($limit!=""){
			$select .= " LIMIT ".$limit;
		}
		//echo $select; exit;
		$res = mysql_query($select);
		while($res_row = mysql_fetch_array($res)){
		 $res_data[] = $res_row; 
		}
		
		return $res_data;
	}
	function insertToDb($tbl,$fields){
		$insert = "INSERT INTO ".$tbl." SET ".$fields;
		$exe = mysql_query($insert);
		if($exe){
			$val = 1;
		}else{
			$val = 0;	
		}
		return $val;
	}


	function updateToDb($tbl,$fields,$condition){
	 $update = "UPDATE ".$tbl." SET ".$fields." WHERE ".$condition;
		 $exe = mysql_query($update);
		if($exe){
			$val = 1;
		}else{
			$val=0;
		}
		return $val;
	}
	function selectFromDb($tbl,$fields,$all="*",$condition="",$order="",$limit="")
	{
	
		$select = "SELECT ";
		
		if($fields!=""){
			$select .= $fields;
		}else{
			$select .= $all;
		}
		
		$select .= " FROM ".$tbl." ";
		if($condition!=""){
			$select .= "WHERE ".$condition;
		}
		if($order!=""){
			$select .= " ".$order;
		}
		if($limit!=""){
			$select .= $limit;
		}
		//echo $select;exit;
		$exe = $this->exeCute($select);
		return $exe;
		
	}
         function delete($tbl_nm,$field,$condition){
		if($field!=""){
			$select = "DELETE ".$field." FROM ".$tbl_nm." WHERE ".$condition;
		}else{
			$select = "DELETE FROM ".$tbl_nm." WHERE ".$condition;
		}
		//echo $select;exit;
		$sql = mysql_query($select);
		if($sql){
			return true;
		}else{
			return false;
		}
		
	}
        
	function countRec($tbl_nm,$condition=""){
		$select = "SELECT * FROM ".$tbl_nm;
		if($condition!=""){
			$select .= " WHERE ".$condition;
		}
		$row_query = mysql_query($select);
		$num_row = mysql_num_rows($row_query);
		
		return $num_row; 
	}
	function fetchSingleLatest($tbl_nm,$condition="",$key=""){
		$select = "SELECT * FROM ".$tbl_nm;
		if($condition!=""){
			$select .= " WHERE ".$condition;
		}
		if($key!=""){
			$select .= " ORDER BY ".$key." LIMIT 1"; 
		}
		//echo $select;exit;
		$qry_exe = mysql_query($select);
		$ret_rec = mysql_fetch_array($qry_exe);
		
		return $ret_rec;
	}
	function fetchSingle($tbl_nm,$field,$condition){
		if($field!=""){
			$select = "SELECT ".$field." FROM ";
		}else{
			$select = "SELECT * FROM ";
		}
		$select .= $tbl_nm." WHERE ".$condition;
		$sql = mysql_query($select);
		$data_row = mysql_num_rows($sql);
		if($data_row>0){
			$rec = mysql_fetch_array($sql);
			return $rec;
			}else{
			$rec=0;
			return $rec;  
			}

	}

function checkDuplicate($tbl_nm,$condition){
		$select = "SELECT * FROM ".$tbl_nm." WHERE ".$condition;
		$sql = mysql_query($select);
		$row = mysql_num_rows($sql);
		if($row>0){
			return 1;
		}else{
			return 0;
		}
	}




     function enableReview($id) {
		$id = inText($id);
		$sql = "UPDATE tbl_user set review_status='1' where id='$id'";
		$res = $this->update($sql);
		$msg = "success";
		return $msg;
	}
	
	
	function disableReview($id) {
		$id = inText($id);		
		$sql = "UPDATE tbl_user set review_status='0' where id='$id'";
		$res = $this->update($sql);
		$msg = "success";
		return $msg;
	}
	
function fetch_old_data($tbl_nm,$condition="",$order="",$limit=""){
		 $select = "SELECT * FROM ".$tbl_nm;
		if($condition!=""){
			$select .= " WHERE ".$condition;
		}
		if($order!=""){
			$select .= " ORDER BY ".$order;
		}
		if($limit!=""){
			$select .= " LIMIT ".$limit;
		}
		//echo $select; exit;
		$res = mysql_query($select);
		while($res_row = mysql_fetch_array($res)){
		$res_data[] = $res_row; 
		}
		
		return $res_data;
	}
	
function getUniqID($insert_id){
	$get_new_id = "FB".sprintf("%04d",$insert_id);
	$upd_uniq_id = $this->updateToDb("fran_details","unique_key = '$get_new_id'","id = $insert_id");
}	

 function insertToUser($tbl,$fields){
		$insert = "INSERT INTO ".$tbl." SET ".$fields;
		$exe = mysql_query($insert);
		if($exe){
			$val = mysql_insert_id();
			$new_val = "JM1".sprintf("%06d",$val);
			$new_upd = "UPDATE ".$tbl." SET Unique_id = '$new_val' WHERE id = '$val'";
			$test = mysql_query($new_upd);
			$new_upd1 = $this->insertToDb("tbl_personal","Profile_id='$new_val'");
			$new_upd1 = $this->insertToDb("tbl_family","Profile_id='$new_val'");
			$new_upd1 = $this->insertToDb("tbl_partner","Profile_id='$new_val'");
			$new_upd1 = $this->insertToDb("tbl_usr_photos","Profile_id='$new_val'");
			$_SESSION['profileid']=$new_val;
			$val = 1;
		}else{
			$val = 0;	
		}
		return $val;
	}

 	function get_user_info($query){
		$select = $query;
		$res = mysql_query($select);
		while($res_row = mysql_fetch_array($res)){
		 $res_data[] = $res_row; 
		}
		
		return $res_data;
	}
 
 	function get_user_info1($query){
	 $query;
		$select = $query;
		$res = mysql_query($select);
		while($res_row = mysql_fetch_array($res)){
		 $res_data[] = $res_row; 
		}
		
		return $res_data;
	}
 
}
?>
