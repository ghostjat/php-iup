<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;
$iup = new core();
$iup->init();
$image = $iup->loadImage(__DIR__ . '/../logo.png');
$label = $iup->Label("PHP:->". phpversion().PHP_EOL.
        "IUP:->".$iup->version()[0].PHP_EOL.
        "RDate:->".$iup->Version()[1].PHP_EOL.
        "ID:->".$iup->Version()[2]);
$img = $iup->Label("null");
$iup->SetAttributeHandle($img, "IMAGE", $image);

$vbox = $iup->vbox($label,$img,null);
$iup->SetAttribute($vbox, "ALIGNMENT", "ACENTER");
$iup->SetAttribute($vbox, "GAP", "10");
$iup->SetAttribute($vbox, "MARGIN", "100x100");

$dlg = $iup->Dialog($vbox);
$iup->SetAttribute($dlg, 'TITLE', 'php-iup');
$iup->SetAttribute($dlg, 'SIZE', "400x200");

$iup->ShowXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->MainLoop();
$iup->close();
