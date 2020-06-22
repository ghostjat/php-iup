<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;
use iup\extra;
use iup\cd;

$iup = new core();

$extra = new extra();

$cd = new cd();


$cells = create_cell();
$dlg = $iup->dialog($cells);
$iup->setAttribute($dlg, "RASTERSIZE", "440x480");
$iup->setAttribute($dlg, "TITLE", "Cells");
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->mainLoop();
$iup->close();

function nlines_cb() {
   return 8;
}

function ncols_cb() {
   return 8;
}

function height_cb() {
   return 50;
}

function width_cb() {
   return 50;
}

function create_cell(){
    global $iup,$extra;
    $cells = $extra->cells();
    $iup->setCallback($cells, "DRAW_CB", "draw_cb");
    $iup->setCallback($cells, "WIDTH_CB", "width_cb");
    $iup->setCallback($cells, "HEIGHT_CB", "height_cb");
    $iup->setCallback($cells, "NLINES_CB", "nlines_cb");
    $iup->setCallback($cells, "NCOLS_CB", "ncols_cb");
    
    return $cells;
}

function draw_cb(){
    global $cd,$iup;
    $cd->canvasForeground($cd::canvasPtr(), $cd::BLACK);
    return $iup::DEFAULT;
}