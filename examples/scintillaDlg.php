<?php
require __DIR__.'/../vendor/autoload.php';


use iup\scintilla;

$scn = new scintilla();
$scn->ImageLibOpen();
$scn->scintillaOpen();

$main_dlg = $scn->ScintillaDlg();
$scn->SetAttribute($main_dlg, "TITLE", "php-IDE");
$scn->SetAttribute($main_dlg, "SIZE", "900x400");
$menu = $scn->GetAttributeHandle($main_dlg, "MENU");
$scn->Append($menu, $scn->SubMenu(
        "&Help", $scn->ffi->IupMenu(
                $scn->SetCallbacks(
                        $scn->Item("&Help..."), "ACTION", "item_help_action_cb",null),
                $scn->SetCallbacks(
                        $scn->Item("&About..."), "ACTION", "item_about_action_cb", null)
                ,null)));
$scn->SetAttribute($main_dlg, "NEWFILE", null);
if($argc > 1 && $argv[1]){
    $filename = $argv[1];
    $scn->SetAttribute($main_dlg, "OPENFILE", $filename);
}
$scn->Show($main_dlg);
$scn->MainLoop();
$scn->close();

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