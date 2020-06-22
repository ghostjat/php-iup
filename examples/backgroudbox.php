<?php
require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();

$text = $iup->text();
$btn = $iup->backgroundBox($iup->frame(
        $iup->setAttributes(
                $iup->vbox($iup->button("Button", ""))
                ,"MARGIN=0x0")));
$dlg = $iup->dialog($iup->vbox($btn));
$iup->setAttributes($dlg, "MARGIN=10x10, GAP=10, TITLE = \"IupBackgroundBox Example\"");
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->mainLoop();
$iup->close();
