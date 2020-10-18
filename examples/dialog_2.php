<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;

$iup = new core();

$quit_bt = $iup->button("Quit");
$iup->setCallback($quit_bt, "ACTION", "quit_cb");

$vbox = $iup->ffi_iup->IupVbox(
        $iup->setAttributes($iup->label("Very Long Text Label"), "EXPAND=YES, ALIGNMENT=ACENTER"),
        $quit_bt,
        null);
$iup->setAttribute($vbox, "ALIGNMENT", "ACENTER");
$iup->setAttribute($vbox, "MARGIN", "10x10");
$iup->setAttribute($vbox, "GAP", "5");


$dialog = $iup->dialog($vbox);
$iup->setAttribute($dialog, "TITLE", "Dialog Title");
$iup->setAttributeHandle($dialog, "DEFAULTESC", $quit_bt);

$iup->show($dialog);

$iup->mainLoop();

$iup->destroy($dialog);
$iup->close();

function quit_cb(){
    global $iup;
    return $iup::CLOSE;
}

