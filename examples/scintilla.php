<?php

/* 
 * php-iup demo for scintilla-editor
 * @author shubham chaudhary
 */
require __DIR__.'/../vendor/autoload.php';

$iup = new iup\core();

$scn = new iup\scintilla();
$sci = $scn->scintilla_init();

$iup->setAttribute($sci, "MULTILINE", "YES");
$iup->setAttribute($sci, "EXPAND", "YES");
$iup->setAttribute($sci, "NAME", "MULTITEXT");
$iup->setAttribute($sci, "DIRTY", "NO");
$iup->setAttribute($sci, "STYLEFGCOLOR34", "255 0 0");
$iup->setAttribute($sci, "LEXERLANGUAGE", "php");
//$iup->setAttribute($sci, "STYLEFONT32", "Courier New");
$iup->setAttribute($sci, "STYLEFONT32", "Consolas");
$iup->setAttribute($sci, "STYLEFONTSIZE32", "10");
$iup->setAttribute($sci, "STYLECLEARALL", "Yes");
$iup->setAttribute($sci, "STYLEFGCOLOR1", "0 128 0");    // 1-C comment 
$iup->setAttribute($sci, "STYLEFGCOLOR2", "0 128 0");    // 2-C++ comment line 
$iup->setAttribute($sci, "STYLEFGCOLOR4", "128 0 0");    // 4-Number 
$iup->setAttribute($sci, "STYLEFGCOLOR5", "0 0 255");    // 5-Keyword 
$iup->setAttribute($sci, "STYLEFGCOLOR6", "160 20 20");  // 6-String 
$iup->setAttribute($sci, "STYLEFGCOLOR7", "128 0 0");    // 7-Character 
$iup->setAttribute($sci, "STYLEFGCOLOR9", "0 0 255");    // 9-Preprocessor block 
$iup->setAttribute($sci, "STYLEFGCOLOR10", "255 0 255"); // 10-Operator 
$iup->setAttribute($sci, "STYLEBOLD10", "YES");
$iup->setAttribute($sci, "KEYWORDS0", 'clone protected private static:: static parent:: __construct  __PHP_Incomplete_Class and or xor __file__ __line__ array as break case cfunction class const continue declare default die do echo else elseif empty enddeclare endfor endforeach endif endswitch endwhile eval exit extends for foreach function global if include include_once isset list new old_function print require require_once return static switch unset use var while __function__ __class__ ');
$iup->setAttribute($sci, "STYLEHOTSPOT6", "YES");
$iup->setAttribute($sci, "MARGINWIDTH0", "50");
$iup->setAttribute($sci, "PROPERTY", "fold=1");
$iup->setAttribute($sci, "PROPERTY", "fold.compact=0");
$iup->setAttribute($sci, "PROPERTY", "fold.comment=1");
$iup->setAttribute($sci, "PROPERTY", "fold.preprocessor=1");

/* line numbers */
$iup->setInt($sci, "MARGINWIDTH0", 30);
$iup->setAttribute($sci, "MARGINSENSITIVE0", "YES");

/* bookmarks */
$iup->setInt($sci, "MARGINWIDTH1", 15);
$iup->setAttribute($sci, "MARGINTYPE1", "SYMBOL");
$iup->setAttribute($sci, "MARGINSENSITIVE1", "YES");
$iup->setAttribute($sci, "MARGINMASKFOLDERS1", "YES");

$iup->setAttribute($sci, "MARKERDEFINE", "FOLDER=PLUS");
$iup->setAttribute($sci, "MARKERDEFINE", "FOLDEROPEN=MINUS");
$iup->setAttribute($sci, "MARKERDEFINE", "FOLDEREND=EMPTY");
$iup->setAttribute($sci, "MARKERDEFINE", "FOLDERMIDTAIL=EMPTY");
$iup->setAttribute($sci, "MARKERDEFINE", "FOLDEROPENMID=EMPTY");
$iup->setAttribute($sci, "MARKERDEFINE", "FOLDERSUB=EMPTY");
$iup->setAttribute($sci, "MARKERDEFINE", "FOLDERTAIL=EMPTY");
$iup->setAttribute($sci, "FOLDFLAGS", "LINEAFTER_CONTRACTED");

$iup->setCallback($sci, "CARET_CB", 'multitext_caret_cb');
$iup->setCallback($sci, "VALUECHANGED_CB", 'multitext_valuechanged_cb');
$iup->setCallback($sci, "DROPFILES_CB", 'dropfiles_cb');
$iup->setCallback($sci, "MARGINCLICK_CB", 'marginclick_cb');


$lbl_statusbar = $iup->label("Lin 1, Col 1");
$iup->setAttribute($lbl_statusbar, "NAME", "STATUSBAR");
$iup->setAttribute($lbl_statusbar, "EXPAND", "HORIZONTAL");
$iup->setAttribute($lbl_statusbar, "PADDING", "10x5");

$dlg = $iup->dialog($iup->ffi_iup->IupVbox($sci, $lbl_statusbar, null));

$iup->setAttribute($dlg, "TITLE", "Php-Iup-Scintilla");
$iup->setAttribute($dlg, "RASTERSIZE", "700x500");
$iup->setAttribute($dlg, "MARGIN", "10x10");

$iup->show($dlg);
$iup->setAttribute($dlg, "RASTERSIZE", NULL);

$iup->mainLoop();
$iup->close();

/* * *************Utilities*********************************** */

function toggleMarker() {
    
}

function setMarkerMask($maskNumber) {
    
}

function copyMarkedLines() {
    
}

function cutMarkedLines() {
    
}

function pasteToMarkedLines() {
    
}

function invertMarkedLines() {
    
}

function removeMarkedLines() {
    
}

function removeUnmarkedLines() {
    
}

function changeTabsToSpaces() {
    
}

function changeSpacesToTabs() {
    
}

function changeLeadingSpacesToTabs() {
    
}

function removeLeadingSpaces() {
    
}

function removeTrailingSpaces() {
    
}

function changeEolToSpace() {
    
}

function str_filetitle() {
    
}

function read_file() {
    
}

function write_file() {
    
}

function new_file() {
    
}

function open_file() {
    
}

function save_file() {
    
}

function saveas_file() {
    
}

function save_check() {
    
}

function toggle_bar_visibility() {
    
}

function set_find_replace_visibility() {
    
}

/* * ***************************calllback**************************** */

function multitext_caret_cb() {
    
}

function multitext_valuechanged_cb() {
    
}

function dropfiles_cb() {
    
}

function marginclick_cb() {
    
}

function file_menu_open_cb() {
    
}

function edit_menu_open_cb() {
    
}

function config_recent_cb() {
    
}

function item_new_action_cb() {
    
}

function item_open_action_cb() {
    
}

function item_saveas_action_cb() {
    
}

function item_save_action_cb() {
    
}

function item_revert_action_cb() {
    
}

function item_exit_action_cb() {
    
}

function goto_ok_action_cb() {
    
}

function goto_cancel_action_cb() {
    
}

function item_goto_action_cb() {
    
}

function item_gotombrace_action_cb() {
    
}

function item_togglemark_action_cb() {
    
}

function item_nextmark_action_cb() {
    
}

function item_previousmark_action_cb() {
    
}

function item_clearmarks_action_cb() {
    
}

function item_copymarked_action_cb() {
    
}

function item_cutmarked_action_cb() {
    
}

function item_pastetomarked_action_cb() {
    
}

function item_removemarked_action_cb() {
    
}

function item_removeunmarked_action_cb() {
    
}

function item_invertmarks_action_cb() {
    
}

function item_eoltospace_action_cb() {
    
}

function item_removespaceeol_action_cb() {
    
}

function item_trimtrailing_action_cb() {
    
}

function item_trimleading_action_cb() {
    
}

function item_trimtraillead_action_cb() {
    
}

function item_tabtospace_action_cb() {
    
}

function item_allspacetotab_action_cb() {
    
}

function item_leadingspacetotab_action_cb() {
    
}

function find_next_action_cb() {
    
}

function find_replace_action_cb() {
    
}

function find_close_action_cb() {
    
}

function create_find_dialog() {
    
}

function item_find_action_cb() {
    
}

function item_replace_action_cb() {
    
}

function selection_find_next_action_cb() {
    
}

function item_copy_action_cb() {
    
}

function item_paste_action_cb() {
    
}

function item_cut_action_cb() {
    
}

function item_delete_action_cb() {
    
}

function item_select_all_action_cb() {
    
}

function item_undo_action_cb() {
    
}

function item_redo_action_cb() {
    
}

function item_uppercase_action_cb() {
    
}

function item_lowercase_action_cb() {
    
}

function item_case_action_cb() {
    
}

function item_font_action_cb() {
    
}

function item_tab_action_cb() {
    
}

function item_zoomin_action_cb() {
    
}

function item_zoomout_action_cb() {
    
}

function item_restorezoom_action_cb() {
    
}

function item_wordwrap_action_cb() {
    
}

function item_showwhite_action_cb() {
    
}

function item_toolbar_action_cb() {
    
}

function item_statusbar_action_cb() {
    
}

function item_linenumber_action_cb() {
    
}

function item_bookmark_action_cb() {
    
}

function item_help_action_cb() {
    
}

function item_about_action_cb() {
    
}