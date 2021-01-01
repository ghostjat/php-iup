<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;

$iup = new core();
$btn = $iup->button('button');
$iup->setAttribute($btn, "EXPAND", "YES");

$ml = $iup->MultiLine();
$iup->SetAttribute($ml, "EXPAND", "YES");
$iup->SetAttribute($ml, "VISIBLELINES", "5");
$iup->SetAttribute($ml, "VISIBLECOLUMNS", "10");

$split = $iup->split($btn, $ml);
$iup->SetAttribute($split, "ORIENTATION", "VERTICAL");
#$iup->SetAttribute($split, "ORIENTATION", "HORIZONTAL");
$iup->SetAttribute($split, "COLOR", "127 127 255");

$vbox = $iup->Vbox($split, NULL);
$iup->SetAttribute($vbox, "MARGIN", "10x10");
$iup->SetAttribute($vbox, "GAP", "10");

$dlg = $iup->Dialog($vbox);
$iup->SetAttribute($dlg, "TITLE", "IupSplit Example");

$iup->Show($dlg);

$iup->mainLoop();
$iup->close();