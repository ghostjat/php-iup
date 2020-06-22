<?php

require __DIR__ . '/../vendor/autoload.php';

$iup = new iup\core();

$txt = $iup->label("timer example");
$iup->setHandle("quit", $txt);

$dlg = $iup->dialog($iup->vbox($txt));
$iup->setAttribute($dlg, "TITLE", "timer example");
$iup->setAttribute($dlg, "SIZE", "200x200");
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);

$timer_1 = $iup->timer();
$timer_2 = $iup->timer();

$iup->setAttribute($timer_1, "TIME", "1000");
$iup->setAttribute($timer_1, "RUN", "YES");
$iup->setCallback($timer_1, "ACTION_CB", "timer_cb");

$iup->setAttribute($timer_2, "TIME", "4000");
$iup->setAttribute($timer_2, "RUN", "YES");
$iup->setCallback($timer_2, "ACTION_CB", "timer_cb");

$iup->mainLoop();

/* Timers are NOT automatically destroyed, must be manually done */
$iup->destroy($timer_1);
$iup->destroy($timer_2);

$iup->close();

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
