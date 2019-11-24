<?php

require 'vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();
$iup->iupVersion();

$label = $iup->iupLabel(phpversion());

$btn = $iup->iupButton('Click To Exit', null);
$iup->iupCallback($btn, "ACTION", 'exit_btn');

$vbox = $iup->iupVbox($btn);
$iup->iupSetAttribute($vbox, "ALIGNMENT", "ACENTER");
$iup->iupSetAttribute($vbox, "GAP", "10");
$iup->iupSetAttribute($vbox, "MARGIN", "10x10");

$dlg = $iup->iupDialog($vbox);
$iup->iupSetAttribute($dlg, 'TITLE', 'php-iup');
$iup->iupShowXY($dlg, $iup::IUP_CENTER, $iup::IUP_CENTER);
$iup->iupMainLoop();
$iup->close();

function exit_btn() {
    global $iup;
    print 'exit';
    $iup->close();
}
