<?php

require_once '../vendor/autoload.php';

$photoOriginal = 'mifoto.jpeg';
$photoSaved = 'fotoMod.jpeg';

$thumb = new PHPThumb\GD($photoOriginal);
$thumb->resize(250,250);
$thumb->show();
$thumb->save($photoSaved);
$thumb->crop(50,50,120,120);
$thumb->save($photoSaved);
