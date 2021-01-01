<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;

$iup = new core();

$text_red = $iup->text();
$text_green = $iup->text();
$text_blue = $iup->text();

$clrbrwsr = $iup->colorBrowser();
$iup->setCallback($clrbrwsr, "CHANGE_CB", "clrbrwsr_change_cb");
$iup->setCallback($clrbrwsr, "DRAG_CB","clrbrwsr_drag_cb");
$vbox = $iup->ffi_iup->IupVbox($iup->fill(), $text_red, $iup->fill(), $text_green, $iup->fill(), $text_blue, $iup->fill(), null);
$hbox_final = $iup->ffi_iup->IupHbox($clrbrwsr, $iup->fill(), $vbox, null);
$dlg = $iup->dialog($hbox_final);
$iup->setAttribute($dlg, "TITLE", "IupColorBrowser");
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);

$iup->mainLoop();
$iup->close();

function clrbrwsr_change_cb(...$opts) {
    global $iup, $clrbrwsr;
    $iup->getAttribute($clrbrwsr, "VALUE");
    return $iup::DEFAULT;
}

function clrbrwsr_drag_cb(...$opts) {
    global $iup, $text_red, $text_green, $text_blue;
    
    $iup->setAttribute($text_red, "VALUE", $r);
    $iup->setAttribute($text_green, "VALUE", $g);
    $iup->setAttribute($text_blue, "VALUE", $b);
    
    $iup->loopStep();
    $iup::DEFAULT;
}
