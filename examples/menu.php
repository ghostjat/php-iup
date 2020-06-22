<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();

$item_open = $iup->item("Open");
$item_saveAs = $iup->item("Save As");
$item_exit = $iup->item("Exit");
$iup->setCallback($item_exit, "ACTION", 'exit_cb');

$file_menu = $iup->ffi_iup->IupMenu($item_open,$item_saveAs,$item_exit, null);
$sub_menu1 = $iup->subMenu("File", $file_menu);
$menu = $iup->menu($sub_menu1);

$multiText = $iup->text(null);
$vbox = $iup->vbox($multiText);

$iup->setAttribute($multiText, "MULTILINE", "YES");
$iup->setAttribute($multiText, "EXPAND", "YES");

$dlg = $iup->dialog($vbox);
$iup->setAttributeHandle($dlg, "MENU", $menu);
$iup->setAttribute($dlg, 'TITLE', 'php-iup');
$iup->setAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');

$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->setAttribute($dlg, 'USERSIZE', null);
$iup->mainLoop();
$iup->close();

function exit_cb() {
    global $iup;
    print 'exit';
    $iup->close();
}