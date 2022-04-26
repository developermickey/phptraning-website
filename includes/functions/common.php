<?php
function getPageUrl($url) {
	
	$pageurl = SITE_HOME."page.php?page=".$url;
	//$pageurl = SITE_HOME."pages/".$url.".php";
	return $pageurl;
}
function photoUrl($url) {
	$pageurl = SITE_HOME."photo-gallery/".$url.".php";
	//$pageurl = SITE_HOME."includes/photogallery_body_content.php";
	//print "Page::::Vij:::".$pageurl; 
	return $pageurl;
}
function newsUrl($url) {
//	$pageurl = SITE_HOME."newsitem/".$url.".php";
	$pageurl = SITE_HOME."news.php?page=".$url;
	return $pageurl;
}
function annoUrl($url) {
	$pageurl = SITE_HOME."annoitem/".$url.".php";
	return $pageurl;
}
function eventsUrl($url) {
	$pageurl = SITE_HOME."eventsitem/".$url.".php";
	return $pageurl;
}
function noticeUrl($url) {
	$pageurl = SITE_HOME."noticeitem/".$url.".php";
	return $pageurl;
}
function filter($data) {
//echo $data;
    $data = trim(htmlentities(strip_tags($data))); 
    if (get_magic_quotes_gpc())
        $data = stripslashes($data); 
    $data = mysql_real_escape_string($data); 
//	echo $data;
    return $data;
}
function cleanHex($input){
//echo $input;
	$clean = preg_replace("![\][xX]([A-Fa-f0-9]{1,3})!", "",$input);
	//echo $clean;
	return $clean;
}
function cleanInput($input) {
	return inText(cleanHex($input));
}
function formatDate($date) {
	$pieces = explode("-",$date);
	$dt = date("d/m/Y",strtotime($pieces[0].$pieces[1].$pieces[2]));
	return $dt;
}
function redirect($page="") {
	if($page=="") return false;
	else @header("Location: ".$page);
}
function inText($str) {
	$str = addslashes(strip_tags($str));
	return $str;
}
function inHTML($str) {
	$str = addslashes($str);
	return $str;
}
function outText($str) {
	$str = stripslashes($str);
	return $str;
}
function resizeImage ($image,$w=0,$h=0) {
	if(file_exists($image)) {
		list($width, $height, $type, $attr) = getimagesize($image);
		
		$new_height = 0;	$new_width = 0;
		if($w>0) {
			$new_height = ceil(($w/$width)*$height);
			$new_width = $w;
		}
		elseif($h>0) {
			$new_width = ceil(($h/$height)*$width);
			$new_height = $h;
		}
		$ret = array("width"=>$new_width, "height"=>$new_height);
		return $ret;
	}
	else {
		return false;
	}
}
function showImage($image,$width="",$height="",$alt="",$title="",$parameters="") {
	list($orwidth, $orheight) = getimagesize($image);
	if($orwidth!=0 && $orheight!=0) {		
		$img = "<img src='$image' ";
		if(notNull($alt)) $img .= "alt='$alt' ";
		if(notNull($title)) $img .= "title='$title' ";
		if(notNull($width)) {
			$img .= "width='$width' ";
			if(!notNull($height)) {
				$height = ceil(($width/$orwidth)*$orheight);
				$img .= "height='$height' ";
			}
		}
		if(notNull($height)) {
			$img .= "height='$height' ";
			if(!notNull($width)) {
				$width = ceil(($height/$orheight)*$orwidth);
				$img .= "width='$width' ";
			}
		}
		if(notNull($parameters)) $img .= $parameters;
		
		$img .= " border='0' />";
	}
	else {
		$img = "";
	}
	return $img;
}
?>