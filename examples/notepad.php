<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();

$multiText = $iup->iupText(null);
$vbox = $iup->iupVbox($multiText);

$iup->iupSetAttribute($multiText, "MULTILINE", "YES");
$iup->iupSetAttribute($multiText, "EXPAND", "YES");

$dlg = $iup->iupDialog($vbox);
$iup->iupSetAttribute($dlg, 'TITLE', 'php-iup');
$iup->iupSetAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');

$iup->iupShowXY($dlg, $iup::IUP_CENTER, $iup::IUP_CENTER);
$iup->iupSetAttribute($dlg, 'USERSIZE', null);
$iup->iupMainLoop();
$iup->close();