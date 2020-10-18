<?php

require __DIR__ . '/../vendor/autoload.php';


try {
    $db = new PDO('sqlite://home/ghost/database/stock.sqlite');
    $db->exec('PRAGMA journal_mode=wal;');
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = $db->query('select * from tatamotors');
while($v = $sql->fetch(PDO::FETCH_OBJ)){
    $date[] = $v->date;
    $open[] = $v->open;
    $high[] = $v->high;
    $low [] = $v->low;
    $close[] = $v->close;
}
$data = ["Date"=>$date,"Open"=>$open,"High"=>$high,"Low"=>$low,"Close"=>$close];

use iup\core;
use iup\extra;

$iup = new core();
$extra = new extra();

$matrix = $extra->matrix();
$iup->matrixData($matrix, $data);

#$iup->setCallback($matrix, "VALUE_CB", 'matrix_value_cb');
#$iup->setCallback($matrix, "VALUE_EDIT_CB", 'matrix_value_edit_cb');

$dlg = $iup->dialog($matrix);
$iup->setAttribute($dlg, "TITLE", "Cells");
$iup->setAttribute($dlg, "SIZE", "300x150");
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);
$iup->mainLoop();
$iup->close();

function cellDataInit() {
    
}

function matrix_value_cb() {
    
}

function matrix_value_edit_cb() {
    
}
