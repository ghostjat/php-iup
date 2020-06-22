<?php
/**
 * php-iup demo 
 * Shows a dialog similar to the one shown 
 * when you exit a program without saving
 */
require __DIR__.'/../vendor/autoload.php';

use iup\core;

$iup = new core();
$alarm = $iup->alarm("php-iup", "File not saved! save it now", "Yes", "No", "Cancle");

switch ($alarm) {
    case 1:
      $iup->message ("Save file", "File saved successfully - leaving program");
    break;

    case 2:
      $iup->message ("Save file", "File not saved - leaving program anyway");
    break;

    case 3:
      $iup->message ("Save file", "Operation canceled");
    break;
}

$iup->close();