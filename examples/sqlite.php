<?php

require __DIR__ . '/../vendor/autoload.php';


try {
    $db = new PDO('sqlite://home/ghost/database/stock.sqlite');
    $db->exec('PRAGMA journal_mode=wal;');
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = $db->query('select * from tatamotors');
while ($v = $sql->fetch(PDO::FETCH_OBJ)) {
    $date[] = $v->date;
    $open[] = $v->open;
    $high[] = $v->high;
    $low [] = $v->low;
    $close[] = $v->close;
    $volumne[] = $v->volume;
    $amountChange[] = $v->amount_change;
    $perecnChange[] = $v->percent_change;
}
$data = ["Date" => $date, "Open" => $open, "High" => $high, "Low" => $low, "Close" => $close,
    "Volumne" => $volumne, "Amt-Change" => $amountChange, "% Change" => $perecnChange];

function sms($cmd, $table = '') {
    global $db;
    switch ($cmd) {
        case "tableInfo":
            $sql = $db->query('PRAGMA  table_info(' . $table . ')');
            while ($v = $sql->fetch(PDO::FETCH_OBJ)) {
                $name[] = $v->name;
                $type[] = $v->type;
                $notnull[] = $v->notnull;
                $dflt_value[] = $v->dflt_value;
                $pk[] = $v->pk;
            }
            $data = ["Name" => $name, "Type" => $type, "Null" => $notnull,
                "DfltValue" => $dflt_value, "P_Key" => $pk];
            break;
        case "tableList":
            $sql = $db->query("select name from sqlite_master where type='table'");
            foreach ($sql as $v) {
                $data[] = $v['name'];
            }
            return $data;
            break;
        case "stock":
            break;
    }
}

use iup\core;
use iup\extra;

$iup = new core();
$extra = new extra();

$matrix = $extra->matrix();
$iup->matrixData($matrix, $data);

#$iup->setCallback($matrix, "VALUE_CB", 'matrix_value_cb');
#$iup->setCallback($matrix, "VALUE_EDIT_CB", 'matrix_value_edit_cb');
init_tree();
$tree = $iup->getHandle("tree");
$vbox = $iup->split($matrix,$tree);
$dlg = $iup->dialog($vbox);
$iup->setAttribute($dlg, "TITLE", "Cells");
$iup->setAttribute($dlg, "SIZE", "300x150");
$iup->showXY($dlg, $iup::CENTER, $iup::CENTER);
init_tree_atributes();
$iup->mainLoop();
$iup->close();

function init_tree() {
    global $iup;
    $tree = $iup->Tree();
    $iup->setCallback($tree,"SELECTION_CB", "selectnode");
    $iup->setAttribute($tree, "SHOWRENAME", "YES");
    $iup->setHandle("tree", $tree);
}

function init_tree_atributes() {
    global $iup, $db;
    $tree = $iup->getHandle("tree");
    $iup->setAttribute($tree, "TITLE", "DataBase");
    $sql = $db->query("select name from sqlite_master where type='table'");
    foreach ($sql as $v) {
        $iup->setAttribute($tree, "ADDLEAF", $v['name']);
    }
}

function selectnode() {
    global $iup,$db;
    $tree = $iup->getHandle('tree');
    $val = $iup->getAttribute($tree, "VALUE");
    print_r($val).PHP_EOL;
    return $iup::DEFAULT;
}

function matrix_value_cb() {
    
}

function matrix_value_edit_cb() {
    
}
