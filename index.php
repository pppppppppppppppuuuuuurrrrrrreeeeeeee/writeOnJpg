<?php
require __DIR__.'/PersianRender.php';
putenv('GDFONTPATH=' . realpath('./fonts/'));
header('Content-Type: image/jpeg');
use \PersianRender\PersianRender;
$yekan = 'Yekan.ttf';
$arial = 'arial.ttf';





$im = imagecreatefromjpeg('SnapshotJPEG.jpeg');
$mainWidth = imagesx($im);
$mainHeight = imagesy($im);

$rectangle = imagecreatetruecolor($mainWidth, $mainHeight + 60);
$gray = imagecolorallocate($im, 200, 200, 200);
imagefill($rectangle, 0, 0, $gray);

imagecopymerge(
    $rectangle,
    $im,
    0,
    60,
    0,
    0,
    $mainWidth,
    $mainHeight,
    100
);

$black = imagecolorallocate($im, 0, 0, 0);

$name = PersianRender::render('نام سامانه : سامانه ی ثبت تخلف دوربین نظارتی دانشگاه شریف');
imagettftext($rectangle, 12, 0, $mainWidth - 400, 15, $black, $yekan, $name);

$dateLabel = PersianRender::render("تاریخ:");
imagettftext($rectangle, 12, 0, 170, 15, $black, $yekan, $dateLabel);

$date = ("1399/12/27 12:12:12");
imagettftext($rectangle, 12, 0, 20, 17, $black, $arial, $date);

$mistake = PersianRender::render('نوع تخلف : ورود ممنوع');
imagettftext($rectangle, 12, 0, $mainWidth - 172, 40, $black, $yekan, $mistake);

$speedLabel = PersianRender::render("سرعت:");
imagettftext($rectangle, 12, 0, 160, 40, $black, $yekan, $speedLabel);

$speedVar = ("999");
imagettftext($rectangle, 12, 0, 130, 42, $black, $arial, $speedVar);

$speedLabel = PersianRender::render("کیلومتر");
imagettftext($rectangle, 12, 0, 80, 40, $black, $yekan, $speedLabel);

imagepng($rectangle);

imagejpeg($rectangle);

imagedestroy($im);