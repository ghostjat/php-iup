<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();

$item_open = $iup->Item("Open");
$item_saveAs = $iup->Item("Save As");
$item_exit = $iup->Item("Exit");
$iup->SetCallback($item_exit, "ACTION", 'exit_cb');

$file_menu = $iup->ffi->IupMenu($item_open,$item_saveAs,$item_exit, null);
$sub_menu1 = $iup->SubMenu("File", $file_menu);
$menu = $iup->Menu($sub_menu1);

$multiText = $iup->Text(null);
$vbox = $iup->Vbox($multiText);

$iup->SetAttribute($multiText, "MULTILINE", "YES");
$iup->SetAttribute($multiText, "EXPAND", "YES");

$dlg = $iup->Dialog($vbox);
$iup->SetAttributeHandle($dlg, "MENU", $menu);
$iup->SetAttribute($dlg, 'TITLE', 'php-iup');
$iup->SetAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');

$iup->ShowXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->SetAttribute($dlg, 'USERSIZE', null);
$iup->MainLoop();
$iup->close();

function exit_cb() {
    global $iup;
    print 'exit';
    $iup->close();
}