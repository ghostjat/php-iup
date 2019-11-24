<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();

$item_exit = $iup->iupItem("Exit");
$iup->iupSetCallback($item_exit, "ACTION", 'exit_cb');

$file_menu = $iup->iupMenu($item_exit);
$sub_menu1 = $iup->iupSubMenu("File", $file_menu);
$menu = $iup->iupMenu($sub_menu1);

$multiText = $iup->iupText(null);
$vbox = $iup->iupVbox($multiText);

$iup->iupSetAttribute($multiText, "MULTILINE", "YES");
$iup->iupSetAttribute($multiText, "EXPAND", "YES");

$dlg = $iup->iupDialog($vbox);
$iup->iupSetAttributeHandle($dlg, "MENU", $menu);
$iup->iupSetAttribute($dlg, 'TITLE', 'php-iup');
$iup->iupSetAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');

$iup->iupShowXY($dlg, $iup::IUP_CENTER, $iup::IUP_CENTER);
$iup->iupSetAttribute($dlg, 'USERSIZE', null);
$iup->iupMainLoop();
$iup->close();

function exit_cb() {
    global $iup;
    print 'exit';
    $iup->close();
}