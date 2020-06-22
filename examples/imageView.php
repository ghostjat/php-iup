<?php
require __DIR__.'/../vendor/autoload.php';

use iup\core;
use iup\image;

$iup = new core();
$ffi_img = new image();

$image = $ffi_img->loadImage('../php.png');

$img_lbl = $iup->label(null);
$iup->setAttributeHandle($img_lbl,'IMAGE',$image);
$iup->setAttribute($img_lbl,'PADDING','10x10');

$vbox = $iup->vbox($img_lbl,null);
$iup->setAttribute($vbox,'MARGIN','10x10');

$frame = $iup->frame($vbox);
$iup->setAttribute($frame,'TITLE',null);
$iup->SetAttribute($frame, "PADDING", '10x10');

$dlg = $iup->dialog($frame);
$iup->setAttribute($dlg,'TITLE','php-IUP');
$iup->setAttribute($dlg,'SIZE','390x190');
$iup->show($dlg);
$iup->mainLoop();
$iup->close();

