<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();

$btn = $iup->Button('Click To Exit', null);

$iup->Callback($btn, "ACTION", 'exit_btn');

$vbox = $iup->Vbox($btn);
$iup->SetAttribute($vbox, "ALIGNMENT", "ACENTER");
$iup->SetAttribute($vbox, "GAP", "10");
$iup->SetAttribute($vbox, "MARGIN", "10x10");

$dlg = $iup->Dialog($vbox);

$iup->SetAttribute($dlg, 'TITLE', 'php-iup');
$iup->ShowXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->MainLoop();
$iup->close();

function exit_btn() {
    global $iup;
    print 'exit';
    $iup->close();
}
