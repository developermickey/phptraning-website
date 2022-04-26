<?php
session_start();
$text = rand(10000,99999);
$_SESSION["vercode"] = $text;

$height = 22;
$width = 60;
 
/*$text_width = $font_width * strlen($text);
$position_center = ceil(($width - $text_width) / 2);
*/
$image_p = imagecreate($width, $height);
$black = imagecolorallocate($image_p, 61, 61, 61);
$white = imagecolorallocate($image_p, 255, 255, 255);
$font_size = 15; 
imagestring($image_p, $font_size, 7, 3, $text, $white);
imagejpeg($image_p, null, 80);

?>