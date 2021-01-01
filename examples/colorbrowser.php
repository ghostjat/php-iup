<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;

$iup = new core();

$text_red = $iup->text();
$text_green = $iup->text();
$text_blue = $iup->text();

$clrbrwsr = $iup->colorBrowser();
#$iup->setCallback($clrbrwsr, "CHANGE_CB", "clrbrwsr_change_cb");
$iup->setCallback($clrbrwsr, "DRAG_CB", FFI::cast(FFI::typeof($iup->ffi_iup->new("IFnccc")),$fn));
$vbox = $iup->ffi_iup->IupVbox($iup->fill(), $text_red, $iup->fill(), $text_green, $iup->fill(), $text_blue, $iup->fill(), null);
$hbox_final = $iup->ffi_iup->IupHbox($clrbrwsr, $iup->fill(), $vbox, null);
$dlg = $iup->dialog($hbox_final);
$iup->setAttribute($dlg, "TITLE", "IupColorBrowser");
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);

$iup->mainLoop();
$iup->close();

function clrbrwsr_change_cb($ih,$r,$g,$b) {
    global $iup, $text_red, $text_green, $text_blue;
    
    $iup->setAttribute($text_red, "VALUE", (string) $r);
    $iup->setAttribute($text_green, "VALUE", (string) $g);
    $iup->setAttribute($text_blue, "VALUE", (string)$b);
    
    $iup->loopStep();
    $iup::DEFAULT;
}
$fn = FFI::new('int');

$fn->cdata = function ($ih,$r,$g,$b) {
    global $iup, $text_red, $text_green, $text_blue;
    
    $iup->setAttribute($text_red, "VALUE", (string) $r);
    $iup->setAttribute($text_green, "VALUE", (string) $g);
    $iup->setAttribute($text_blue, "VALUE", (string)$b);
    
    $iup->loopStep();
    $iup::DEFAULT;
};
