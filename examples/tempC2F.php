<?php
require __DIR__.'/../vendor/autoload.php';

use iup\core;


$iup = new core();
$iup->init();

$celsius = $iup->Label("Celsius:-");
$farenheit = $iup->Label("Farenheit:-");

$temp_C = $iup->Text();
$iup->SetAttribute($temp_C, "SIZE", "50");
$iup->SetAttribute($temp_C, "NAME", "celsius");
$iup->SetAttribute($temp_C, "MASK", $iup::MASK_FLOAT);

$temp_F = $iup->Text();
$iup->SetAttribute($temp_F, "SIZE", "50");
$iup->SetAttribute($temp_F, "NAME", "fahrenheit");
$iup->SetAttribute($temp_F, "MASK", $iup::MASK_FLOAT);

$hbox = $iup->ffi->IupHbox($celsius,$temp_C,$farenheit,$temp_F,null);
$iup->SetAttribute($hbox, "Margin", "10x10");
$iup->SetAttribute($hbox, "GAP", "10");
$iup->SetAttribute($hbox, "ALIGNMENT", "ACENTER");

$dlg = $iup->Dialog($hbox);
$iup->SetAttribute($dlg, "TITLE", "php-temp");
$iup->SetAttribute($temp_C, "VALUE", "");
$iup->SetAttribute($temp_F, "VALUE", "");

$iup->SetCallback($temp_C, "VALUECHANGED_CB", 'txt_celcius_cb');
#$iup->SetCallback($temp_F, "VALUECHANGED_CB", "txt_fahrenheit_cb");

$iup->ShowXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->MainLoop();
$iup->close();

function txt_celcius_cb(){
    global $iup,$temp_C,$temp_F;
    $iup->GetDialogChild($temp_F, "fahrenheit");
    $data = $iup->getDouble($temp_C,"VALUE");
    $value = $data * (9/5)+32;
    print $value;
}