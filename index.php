<?php
require __DIR__.'/PersianRender.php';
header('Content-Type: image/png');

// Create the image
$im = imagecreatefromjpeg('a.jpg'); 

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 499, 69, $white);

putenv('GDFONTPATH=' . realpath('./fonts/'));
// The text to draw

$text  = \PersianRender\PersianRender::render('لورم ایپسوم');

// Replace path by your own font path
$font = 'Yekan.ttf';


// Add the text

imagettftext($im, 40, 0, 14, 40, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);