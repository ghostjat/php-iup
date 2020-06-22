<?php
require __DIR__.'/../vendor/autoload.php';


$iup = new iup\core();
$scn = new iup\scintilla();

$main_dlg = $scn->ScintillaDlg();
$iup->setAttribute($main_dlg, "TITLE", "php-IDE");
#$scn->SetAttribute($main_dlg, "SIZE", "900x400");
$menu = $iup->getAttributeHandle($main_dlg, "MENU");
$iup->append($menu, $iup->subMenu(
        "&Help", $iup->ffi_iup->IupMenu(
                $iup->setCallbacks(
                        $iup->item("&Help..."), "ACTION", "item_help_action_cb",null),
                $iup->setCallbacks(
                        $iup->item("&About..."), "ACTION", "item_about_action_cb", null)
                ,null)));
$iup->setAttribute($main_dlg, "NEWFILE", null);
if($argc > 1 && $argv[1]){
    $filename = $argv[1];
    $iup->setAttribute($main_dlg, "OPENFILE", $filename);
}
$iup->show($main_dlg);
$iup->mainLoop();
$iup->close();

function item_help_action_cb(){
    global $scn;
    $scn->Help("https://github.com/ghost.jat/php-iup");
    return $scn::DEFAULT;
}

function item_about_action_cb(){
    global $scn;
    $scn->Message("About", "php-Scintilla\n\n Author:\n Shubham Chaudhary\n php::" .phpversion()."\n iup::3.28");
    return $scn::DEFAULT;
}