<?php

	session_start();
	$hash=md5(mt_rand(11111,99999));

	$text=substr($hash,26);
	$_SESSION['code']=$text;
	
	$font_size=30;
	$width=110;
	$height=45;

	header('content-type:image/jpeg');
	$font='/xampp/htdocs/ocs-server/stylemy.ttf';
	$image=imagecreate($width,$height);
	imagecolorallocate($image,215,215,215);
	$font_color=imagecolorallocate($image,0,0,255);
	imagettftext($image, $font_size, 0, 20, 40, $font_color,$font, $text);
	imagejpeg($image);
?>