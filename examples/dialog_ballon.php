<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;
use iup\image;

$iup = new core();
$ffi_img = new image();

$image = $ffi_img->loadImage("/home/ghost/projects/ffi/iup/c-code/C/balloon.png");

$quit_bt = $iup->button("Quit");
$iup->setCallback($quit_bt, "ACTION", "quit_cb");

$vbox = $iup->ffi_iup->IupVbox(
        $iup->setAttributes($iup->flatLabel("Very Long Text Label"), "EXPAND=YES, ALIGNMENT=ACENTER, FONTSIZE=24"),
        $quit_bt,
        NULL);

$iup->setAttribute($vbox, "ALIGNMENT", "ACENTER");
$iup->setAttribute($vbox, "MARGIN", "200x200");
$iup->setAttribute($vbox, "GAP", "5");

$vbox = $iup->backgroundBox($vbox);
$iup->setAttribute($vbox, "RASTERSIZE", "804x644");
//  $iup->setAttribute($vbox, "BACKCOLOR", "255 255 255");
$iup->setAttribute($vbox, "BGCOLOR", "255 255 255");
$iup->setAttributeHandle($vbox, "BACKIMAGE", $image);

$dialog = $iup->dialog($vbox);
$iup->setAttributeHandle($dialog, "DEFAULTESC", $quit_bt);
//$iup->setCallback($dialog, "RESIZE_CB", "resize_cb");

$iup->setAttribute($dialog, "BORDER", "NO");
$iup->setAttribute($dialog, "RESIZE", "NO");
$iup->setAttribute($dialog, "MINBOX", "NO");
$iup->setAttribute($dialog, "MAXBOX", "NO");
$iup->setAttribute($dialog, "MENUBOX", "NO");
$iup->setAttributeHandle($dialog, "SHAPEIMAGE", $image);
//  $iup->setAttributeHandle(dialog, "OPACITYIMAGE", image);
//  $iup->setAttribute(dialog, "OPACITY", "128");

$iup->show($dialog);

$iup->mainLoop();

$iup->destroy($dialog);
$iup->close();

function quit_cb() {
    global $iup;
    return $iup::CLOSE;
}

function resize_cb($dlg, $w, $h) {
    global $iup;
    $image = $iup->getAttributeHandle($dlg, "SHAPEIMAGE");
    $iup->setStrf($image, "RESIZE", "%dx%d", $w, $h);
    $iup->setAttribute($dlg, "SHAPEIMAGE", NULL);
    $iup->setAttributeHandle($dlg, "SHAPEIMAGE", $image);
    return $iup::DEFAULT;
}
