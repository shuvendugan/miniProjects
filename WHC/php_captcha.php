<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$RandomStr = md5(microtime());// md5 to generate the random string

$ResultStr = substr($RandomStr,0,6);//trim 5 digit 

$NewImage =imagecreatefromjpeg("../images/img.jpg");//image create by existing image and as back ground 

//$LineColor = imagecolorallocate($NewImage,120,120,120);//line color 
$TextColor = imagecolorallocate($NewImage, 000, 000, 000);//text color-white
$_SESSION['captcha'] = $ResultStr;

//imageline($NewImage,1,1,40,40,$LineColor);//create line 1 on image 
//imageline($NewImage,1,100,60,0,$LineColor);//create line 2 on image 
//$font = imageloadfont('fonts/04b.gdf');
//imagestring($NewImage, $font, 120, 13, $ResultStr, $TextColor);// Draw a random string horizontally 
imagestring($NewImage, 5, 30, 13, $ResultStr, $TextColor);// Draw a random string horizontally 

//$_SESSION['key'] = $ResultStr;// carry the data through session
// echo 'Session ID: ' . session_id() . '<br>';
// echo 'CAPTCHA Value: ' . $_SESSION['captcha'] . '<br>';exit();
// print_r($_SESSION);exit();
header("Content-type: jpeg");// out out the image 

imagejpeg($NewImage);//Output image to browser 

?>
