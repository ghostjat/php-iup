<?php

require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();
$password = [];
function k_any($c){
    global $iup,$password,$pwd;
    switch ($c){
  case $iup::K_BS:
    {
      $size = strlen($password);
      if ($size == 0) {
                    return $iup::IGNORE;
                }
                $password[$size-1] = 0;
      $iup->SetAttribute($pwd, "VALUE", $password);
      return $iup::DEFAULT;
    }
  default:
    return $iup::DEFAULT;
  }
}

function action($c) {
    global $iup,$password,$pwd;
    print_r($c); exit;
    if ($c) {
    $size = strlen($password);
    $password[$size] = $c;
    $password[$size+1] = 0;
    $iup->SetAttribute($pwd, "VALUE", $password);
  }
  #return K_asterisk;
}

  $text = $iup->Text();
  $iup->SetAttribute($text, "SIZE",  "200x");
  $iup->SetCallback($text, "ACTION", 'action');
  $iup->SetCallback($text, "K_ANY", 'k_any');

  $pwd = $iup->Text();
  $iup->SetAttribute($pwd, "READONLY", "YES");
  $iup->SetAttribute($pwd, "SIZE", "200x");

  $dlg = $iup->Dialog($iup->ffi->IupVbox($text, $pwd, NULL));
  $iup->SetAttribute($dlg, "TITLE", "IupText");

  $iup->Show($dlg);

  $iup->MainLoop();
  $iup->Close();