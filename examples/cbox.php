<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;
use iup\extra;

$pix1 = [ 1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1
,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1
,1,1,1,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1
,1,1,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1
,1,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1
,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1
,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1
,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,0,2,0,2,0,2,2,0,2,2,2,0,0,0,2,2,2,0,0,2,0,2,2,0,0,0,2,2,2
,2,2,2,0,2,0,0,2,0,0,2,0,2,0,2,2,2,0,2,0,2,2,0,0,2,0,2,2,2,0,2,2
,2,2,2,0,2,0,2,2,0,2,2,0,2,2,2,2,2,0,2,0,2,2,2,0,2,0,2,2,2,0,2,2
,2,2,2,0,2,0,2,2,0,2,2,0,2,2,0,0,0,0,2,0,2,2,2,0,2,0,0,0,0,0,2,2
,2,2,2,0,2,0,2,2,0,2,2,0,2,0,2,2,2,0,2,0,2,2,2,0,2,0,2,2,2,2,2,2
,2,2,2,0,2,0,2,2,0,2,2,0,2,0,2,2,2,0,2,0,2,2,0,0,2,0,2,2,2,0,2,2
,2,2,2,0,2,0,2,2,0,2,2,0,2,2,0,0,0,0,2,2,0,0,2,0,2,2,0,0,0,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,0,2,2,2,2,2,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,0,2,2,2,0,2,2,2,2,2,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,0,0,0,2,2,2,2,2,2,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1
,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1,1
,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1,1,1
,1,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1
,1,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1
,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1
,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1
];
$pix2 = [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2
,2,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2
,2,2,2,2,2,2,2,2,2,2,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2
,2,2,2,2,2,2,2,2,2,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2
,2,2,2,2,2,2,2,2,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2,2
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3
,3,3,3,0,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3
,3,3,3,0,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3
,3,3,3,0,3,0,3,0,3,3,0,3,3,3,1,1,0,3,3,3,0,0,3,0,3,3,0,0,0,3,3,3
,3,3,3,0,3,0,0,3,0,0,3,0,3,0,1,1,3,0,3,0,3,3,0,0,3,0,3,3,3,0,3,3
,3,3,3,0,3,0,3,3,0,3,3,0,3,3,1,1,3,0,3,0,3,3,3,0,3,0,3,3,3,0,3,3
,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1
,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1
,3,3,3,0,3,0,3,3,0,3,3,0,3,0,1,1,3,0,3,0,3,3,0,0,3,0,3,3,3,0,3,3
,3,3,3,0,3,0,3,3,0,3,3,0,3,3,1,1,0,0,3,3,0,0,3,0,3,3,0,0,0,3,3,3
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,0,3,3,3,3,3,3,3,3
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,0,3,3,3,0,3,3,3,3,3,3,3,3
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,0,0,0,3,3,3,3,3,3,3,3,3
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,1,1,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3
,2,2,2,2,2,2,2,3,3,3,3,3,3,3,1,1,3,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,2,2,2,3,3,3,3,3,3,3,3,1,1,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,2,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2
,3,3,3,3,3,3,3,3,3,3,3,3,3,3,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2];

$iup = new core();
$extra = new extra();

function create_mat() {
    global $iup, $extra;
    
    $mat = FFI::cast(FFI::typeof($iup->ihandle()), $extra->Matrix());
    $iup->SetAttribute($mat, "NUMCOL", "1");
    $iup->SetAttribute($mat, "NUMLIN", "3");
    $iup->SetAttribute($mat, "NUMCOL_VISIBLE", "1");
    $iup->SetAttribute($mat, "NUMLIN_VISIBLE", "3");
    $iup->SetAttribute($mat, "EXPAND", "NO");
    $iup->SetAttribute($mat, "SCROLLBAR", "NO");

    $iup->SetAttribute($mat, "0:0", "Inflation");
    $iup->SetAttribute($mat, "1:0", "Medicine ");
    $iup->SetAttribute($mat, "2:0", "Food");
    $iup->SetAttribute($mat, "3:0", "Energy");
    $iup->SetAttribute($mat, "0:1", "January 2000");
    $iup->SetAttribute($mat, "1:1", "5.6");
    $iup->SetAttribute($mat, "2:1", "2.2");
    $iup->SetAttribute($mat, "3:1", "7.2");

    $iup->SetAttribute($mat, "BGCOLOR", "255 255 255");
    $iup->SetAttribute($mat, "BGCOLOR1:0", "255 128 0");
    $iup->SetAttribute($mat, "BGCOLOR2:1", "255 128 0");
    $iup->SetAttribute($mat, "FGCOLOR2:0", "255 0 128");
    $iup->SetAttribute($mat, "FGCOLOR1:1", "255 0 128");

    $iup->SetAttribute($mat, "CX", "600");
    $iup->SetAttribute($mat, "CY", "250");
    return $mat;
}

function createTree() {
    global $iup;
    $tree = $iup->Tree();
    $iup->SetAttributes($tree, "FONT=COURIER_NORMAL_10, \
                          TITLE=Figures, \
                          ADDBRANCH=3D, \
                          ADDBRANCH=2D, \
                          ADDLEAF1=trapeze, \
                          ADDBRANCH1=parallelogram, \
                          ADDLEAF2=diamond, \
                          ADDLEAF2=square, \
                          ADDBRANCH4=triangle, \
                          ADDLEAF5=scalenus, \
                          ADDLEAF5=isosceles, \
                          ADDLEAF5=equilateral, \
                          RASTERSIZE=180x180, \
                          VALUE=6, \
                          CTRL=ON, \
                          SHIFT=ON, \
                          CX=600, \
                          CY=10, \
                          ADDEXPANDED=YES");
    return $tree;
}

function func_1() {
    global $iup, $pix1, $pix2;
    $img = $iup->Image(32, 32, $pix1);
    $iup->SetHandle("img1", $img);
    $iup->SetAttribute($img, "0", "0 0 0");
    $iup->SetAttribute($img, "1", "BGCOLOR");
    $iup->SetAttribute($img, "2", "255 0 0");

    $img = $iup->Image(32, 32, $pix2);
    $iup->SetHandle("img2", $img);
    $iup->SetAttribute($img, "0", "0 0 0");
    $iup->SetAttribute($img, "1", "0 255 0");
    $iup->SetAttribute($img, "2", "BGCOLOR");
    $iup->SetAttribute($img, "3", "255 0 0");

    $frame_1 = $iup->Frame(
            $iup->ffi->IupVbox(
                    $iup->SetAttributes($iup->Button("button-text"), "CINDEX=1"),
                    $iup->SetAttributes($iup->Button(""), "IMAGE=img1,CINDEX=2"),
                    $iup->SetAttributes($iup->Button(""), "IMAGE=img1,IMPRESS=img2,CINDEX=3"),
                    NULL
    ));
    $iup->SetAttribute($frame_1, "TITLE", "IupButton");
    $iup->SetAttribute($frame_1, "CX", "10");
    $iup->SetAttribute($frame_1, "CY", "180");

    $frm_2 = $iup->Frame(
            $iup->ffi->IupVbox(
                    $iup->SetAttributes($iup->Label("Label Text"), "CINDEX=1"),
                    $iup->SetAttributes($iup->Label(""), "SEPARATOR=HORIZONTAL,CINDEX=3"),
                    $iup->SetAttributes($iup->Label(""), "IMAGE=img1,CINDEX=4"),
                    NULL));
    $iup->SetAttribute($frm_2, "TITLE", "IupLabel");
    $iup->SetAttribute($frm_2, "CX", "200");
    $iup->SetAttribute($frm_2, "CY", "250");

    $frm_3 = $iup->Frame(
            $iup->ffi->IupVbox(
                    $iup->SetAttributes($iup->Toggle("Toggle Text"), "VALUE=ON,CINDEX=1"),
                    $iup->SetAttributes($iup->Toggle(""), "IMAGE=img1,IMPRESS=img2,CINDEX=2"),
                    $iup->SetAttributes($iup->Frame($iup->Radio($iup->ffi->IupVbox(
                                                    $iup->SetAttributes($iup->Toggle("Toggle Text"), "CINDEX=3"),
                                                    $iup->SetAttributes($iup->Toggle("Toggle Text"), "CINDEX=4"),
                                                    NULL))), "TITLE=IupRadio"),
                    NULL));
    $iup->SetAttribute($frm_3, "TITLE", "IupToggle");
    $iup->SetAttribute($frm_3, "CX", "400");
    $iup->SetAttribute($frm_3, "CY", "250");

    $text_1 = $iup->Text();
    $iup->SetAttribute($text_1, "VALUE", "IupText Text");
    $iup->SetAttribute($text_1, "SIZE", "80x");
    $iup->SetAttribute($text_1, "CINDEX", "1");
    $iup->SetAttribute($text_1, "CX", "10");
    $iup->SetAttribute($text_1, "CY", "100");

    $ml_1 = $iup->MultiLine();
    $iup->SetAttribute($ml_1, "VALUE", "IupMultiline Text\nSecond Line\nThird Line");
    $iup->SetAttribute($ml_1, "SIZE", "80x60");
    $iup->SetAttribute($ml_1, "CINDEX", "1");
    $iup->SetAttribute($ml_1, "CX", "200");
    $iup->SetAttribute($ml_1, "CY", "100");

    $list_1 = $iup->List();
    $iup->SetAttribute($list_1, "VALUE", "1");
    $iup->SetAttribute($list_1, "1", "Item 1 Text");
    $iup->SetAttribute($list_1, "2", "Item 2 Text");
    $iup->SetAttribute($list_1, "3", "Item 3 Text");
    $iup->SetAttribute($list_1, "CINDEX", "1");
    $iup->SetAttribute($list_1, "CX", "10");
    $iup->SetAttribute($list_1, "CY", "10");

    $list_2 = $iup->List();
    $iup->SetAttribute($list_2, "DROPDOWN", "YES");
    $iup->SetAttribute($list_2, "VALUE", "2");
    $iup->SetAttribute($list_2, "1", "Item 1 Text");
    $iup->SetAttribute($list_2, "2", "Item 2 Text");
    $iup->SetAttribute($list_2, "3", "Item 3 Text");
    $iup->SetAttribute($list_2, "CINDEX", "2");
    $iup->SetAttribute($list_2, "CX", "200");
    $iup->SetAttribute($list_2, "CY", "10");

    $list_3 = $iup->List();
    $iup->SetAttribute($list_3, "EDITBOX", "YES");
    $iup->SetAttribute($list_3, "VALUE", "3");
    $iup->SetAttribute($list_3, "1", "Item 1 Text");
    $iup->SetAttribute($list_3, "2", "Item 2 Text");
    $iup->SetAttribute($list_3, "3", "Item 3 Text");
    $iup->SetAttribute($list_3, "CINDEX", "3");
    $iup->SetAttribute($list_3, "CX", "400");
    $iup->SetAttribute($list_3, "CY", "10");

    $cnv_1 = $iup->Canvas();
    $iup->SetAttribute($cnv_1, "RASTERSIZE", "100x100");
    $iup->SetAttribute($cnv_1, "POSX", "0");
    $iup->SetAttribute($cnv_1, "POSY", "0");
    $iup->SetAttribute($cnv_1, "BGCOLOR", "128 255 0");
    $iup->SetAttribute($cnv_1, "CX", "400");
    $iup->SetAttribute($cnv_1, "CY", "150");

    $ctrl_1 = $iup->Val();
    $iup->SetAttribute($ctrl_1, "CX", "600");
    $iup->SetAttribute($ctrl_1, "CY", "200");

    $cbox = $iup->ffi->IupCbox($text_1, $ml_1, $list_1,
            $list_2, $list_3, $cnv_1, $ctrl_1,
            createTree(), create_mat(), $frame_1, $frm_2, $frm_3, null);
    $iup->SetAttribute($cbox, "SIZE", "480x200");
    $hbox = $iup->SetAttributes($iup->Hbox($cbox), "MARGIN=10x10");
    $dlg = $iup->Dialog($hbox);
    $iup->SetHandle("dlg", $dlg);
    $iup->SetAttribute($dlg, "TITLE", "Cbox-test");
}

$iup->init();
$extra->init();
func_1();
$iup->Show($iup->GetHandle("dlg"));
$iup->MainLoop();
$iup->close();