<?php

require __DIR__ . '/../vendor/autoload.php';


$iup = new iup\core();

function k_any($c) {
    global $iup, $pwd;
    switch ($c) {
        case $iup::K_BS: {
                $size = strlen($iup);
                if ($size == 0) {
                    return $iup::IGNORE;
                }
                $password[$size - 1] = 0;
                $iup->setValue($pwd,$password);
                return $iup::DEFAULT;
            }
        default:
            return $iup::DEFAULT;
    }
}

function action($ih) {
    global $iup, $pwd;
    $password = $iup->getValue($ih);
    $iup->setValue($pwd, $password);

    #return K_asterisk;
}

$text = $iup->text();
$iup->setSize($text, "200x");

$iup->setCallback($text, "ACTION", 'action');
$iup->setCallback($text, "K_ANY", 'k_any');

$pwd = $iup->text();
$iup->setAttribute($pwd, "READONLY", "YES");
$iup->setSize($pwd, "200x");

$dlg = $iup->dialog($iup->ffi_iup->IupVbox($text, $pwd, NULL));
$iup->setTitle($dlg, "IupText");

$iup->show($dlg);

$iup->mainLoop();
$iup->close();
