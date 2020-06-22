<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();

$multiText = $iup->text(null);
$vbox = $iup->vbox($multiText);

$iup->setAttribute($multiText, "MULTILINE", "YES");
$iup->setAttribute($multiText, "EXPAND", "YES");

$dlg = $iup->dialog($vbox);
$iup->setAttribute($dlg, 'TITLE', 'php-iup');
$iup->setAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');

$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->setAttribute($dlg, 'USERSIZE', null);
$iup->mainLoop();
$iup->close();