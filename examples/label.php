<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;
$iup = new core();
$iup->init();

$label = $iup->iupLabel("php-version". phpversion());

$vbox = $iup->iupVbox($label);
$iup->iupSetAttribute($vbox, "ALIGNMENT", "ACENTER");
$iup->iupSetAttribute($vbox, "GAP", "10");
$iup->iupSetAttribute($vbox, "MARGIN", "10x10");

$dlg = $iup->iupDialog($vbox);
$iup->iupSetAttribute($dlg, 'TITLE', 'php-iup');
$iup->iupShowXY($dlg, $iup::IUP_CENTER, $iup::IUP_CENTER);
$iup->iupMainLoop();
$iup->close();
