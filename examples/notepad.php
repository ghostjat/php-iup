<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();

$multiText = $iup->Text(null);
$vbox = $iup->Vbox($multiText);

$iup->SetAttribute($multiText, "MULTILINE", "YES");
$iup->SetAttribute($multiText, "EXPAND", "YES");

$dlg = $iup->Dialog($vbox);
$iup->SetAttribute($dlg, 'TITLE', 'php-iup');
$iup->SetAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');

$iup->ShowXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->SetAttribute($dlg, 'USERSIZE', null);
$iup->MainLoop();
$iup->close();