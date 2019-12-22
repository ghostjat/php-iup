<?php

require __DIR__ . '/../vendor/autoload.php';

use iup\core;

$iup = new core();
$iup->init();

$txt = $iup->Label("timer example");
$iup->SetHandle("quit", $txt);

$dlg = $iup->Dialog($iup->Vbox($txt));
$iup->SetAttribute($dlg, "TITLE", "timer example");
$iup->SetAttribute($dlg, "SIZE", "200x200");
$iup->ShowXY($dlg, $iup::CENTER, $iup::CENTER);

$timer_1 = $iup->Timer();
$timer_2 = $iup->Timer();

$iup->SetAttribute($timer_1, "TIME", "1000");
$iup->SetAttribute($timer_1, "RUN", "YES");
$iup->SetCallback($timer_1, "ACTION_CB", "timer_cb");

$iup->SetAttribute($timer_2, "TIME", "4000");
$iup->SetAttribute($timer_2, "RUN", "YES");
$iup->SetCallback($timer_2, "ACTION_CB", "timer_cb");

$iup->MainLoop();

/* Timers are NOT automatically destroyed, must be manually done */
$iup->Destroy($timer_1);
$iup->Destroy($timer_2);

$iup->Close();

function timer_cb($n) {
    global $iup, $timer_1, $timer_2;
    if ($n == $timer_1) {
        print("timer 1 called\n");
    }

    if ($n == $timer_2) {
        print("timer 2 called\n");
        return $iup::CLOSE;
    }

    return $iup::DEFAULT;
}
