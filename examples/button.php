<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();

$btn = $iup->button('Click To Exit', null);

$iup->callback($btn, "ACTION", 'exit_btn');

$vbox = $iup->vbox($btn);
$iup->setAttribute($vbox, "ALIGNMENT", "ACENTER");
$iup->setAttribute($vbox, "GAP", "10");
$iup->setAttribute($vbox, "MARGIN", "10x10");

$dlg = $iup->dialog($vbox);

$iup->setAttribute($dlg, 'TITLE', 'php-iup');
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->mainLoop();
$iup->close();

function exit_btn() {
    global $iup;
    print 'exit';
    $iup->close();
}
