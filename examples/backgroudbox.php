<?php
require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();
$text = $iup->Text("");
$btn = $iup->BackgroundBox($iup->Frame(
        $iup->SetAttributes(
                $iup->Vbox($iup->Button("Button", ""))
                ,"MARGIN=0x0")));
$dlg = $iup->Dialog($iup->Vbox($btn));
$iup->SetAttributes($dlg, "MARGIN=10x10, GAP=10, TITLE = \"IupBackgroundBox Example\"");
$iup->ShowXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->MainLoop();
$iup->close();
