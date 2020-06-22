<?php

/* 
 *php-iup demo for webView
 */

require __DIR__.'/../vendor/autoload.php';

use iup\core;
use iup\webView;

$iup = new core();
$webView = new webView();
$webOpen = $webView->webopen();

$vbox = $iup->vbox($webOpen);
$dlg = $iup->dialog($vbox);
$iup->setAttribute($dlg,'TITLE','php-IUP');
$iup->setAttribute($dlg, "RASTERSIZE", "800x640");
$iup->setAttribute($dlg, "GAP", "10");
$iup->setAttribute($webOpen,'VALUE',"http://127.0.0.1:8080");
$iup->show($dlg);
$iup->mainLoop();
$iup->close();
