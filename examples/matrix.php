<?php

/*
 * php-iup cbox example 
 * 
 */
require __DIR__ . '/../vendor/autoload.php';

$iup = new iup\core();
$extra = new iup\extra();

function create_matrix() {
    global $iup, $extra;

    $matrix = $extra->matrix();
    $iup->matrixData($matrix,
            [
                "Inflation" => ['Medicine', 'Food', 'Energy', 'Education'],
                "Jan2000" => ['5.6', '2.2', '7.2', '4.2', '4.6'],
                "Jan2010" => ['15.16', '21.12', '71.12', '45.65'],
                "Jan2020" => ['52.63', '32.23', '97.22', '78.89'],
            ]
    );


    return $matrix;
}

$vbox = $iup->vbox(create_matrix());
$dialog = $iup->dialog($vbox);
$iup->setTitle($dialog, "php-iup");
$iup->show($dialog);
$iup->mainLoop();
$iup->close();

