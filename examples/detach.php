<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;

$iup = new core();
$btn = $iup->button("Detach Me!");
$iup->setCallback($btn, "ACTION", "btn_detach_cb");
$iup->setHandle("detach", $btn);

$ml = $iup->multiLine();
$iup->setAttribute($ml, "EXPAND", "YES");
$iup->setAttribute($ml, "VISIBLELINES", "5");

$hbox = $iup->ffi_iup->IupHbox($btn, $ml, null);
$iup->setAttribute($hbox, "MARGIN", "10x0");

$dbox = $iup->detachBox($hbox);
$iup->setAttribute($dbox, "ORIENTATION", "VERTICAL");
$iup->setAttribute($dbox, "SHOWGRIP", "NO");
$iup->setAttribute($dbox, "BARSIZE", "0");
$iup->setAttribute($dbox, "COLOR", "255 0 0");
$iup->setCallback($dbox, "DETACHED_CB", "detached_cb");
$iup->setHandle("dbox", $dbox);


$lbl = $iup->label("Label");
$iup->setAttribute($lbl, "EXPAND", "VERTICAL");

$bt2 = $iup->button("Restore me!");
$iup->setAttribute($bt2, "EXPAND", "YES");
$iup->setAttribute($bt2, "ACTIVE", "NO");
$iup->setCallback($bt2, "ACTION", "btn_restore_cb");
$iup->setHandle("restore", $bt2);

$txt = $iup->text();
$iup->setAttribute($txt, "EXPAND", "HORIZONTAL");

$dlg = $iup->dialog($iup->ffi_iup->IupVbox($dbox, $lbl, $bt2, $txt, NULL));
$iup->setAttribute($dlg, "TITLE", "IupDetachBox Example");
$iup->setAttribute($dlg, "MARGIN", "10x10");
$iup->setAttribute($dlg, "GAP", "10");
$iup->setAttribute($dlg, "RASTERSIZE", "300x300");

$iup->show($dlg);

$iup->mainLoop();
$iup->close();

function detached_cb($new_parent) {
    global $iup;
    $iup->setAttribute($new_parent, "TITLE", "New Dialog");

    $iup->setAttribute($iup->getHandle("restore"), "ACTIVE", "YES");
    $iup->setAttribute($iup->getHandle("detach"), "ACTIVE", "NO");
    printf("Detached!\n");
    return $iup::DEFAULT;
}

function btn_restore_cb($bt) {
    global $iup, $dbox;
    $dbox = $iup->getHandle("dbox");

#if 0
    #$dlg = $iup->getDialog(dbox);
    #$old_parent = $iup->getAttribute($dbox, "OLDPARENT_HANDLE");//(Ihandle*)
    #$ref_child = $iup->getAttribute($dbox, "OLDBROTHER_HANDLE"); //(Ihandle*)
    #$iup->reparent($dbox, $old_parent, $ref_child);
    #$iup->refresh($old_parent);
    #$iup->destroy($dlg);
#else
    $iup->setAttribute($dbox, "RESTORE", NULL);
#endif

    $iup->setAttribute($bt, "ACTIVE", "NO");
    $iup->setAttribute($iup->getHandle("detach"), "ACTIVE", "Yes");

    return $iup::DEFAULT;
}

function btn_detach_cb($bt) {
    global $iup, $dbox;
    $dbox = $iup->getHandle("dbox");
    $iup->setAttribute($dbox, "DETACH", NULL);
    $iup->setAttribute($bt, "ACTIVE", "NO");
    $iup->setAttribute($iup->getHandle("restore"), "ACTIVE", "Yes");

    return $iup::DEFAULT;
}
