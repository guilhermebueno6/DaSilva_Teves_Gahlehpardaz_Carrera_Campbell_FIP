<?php
require_once 'load.php';

$markers_table = 'tbl_place';
$getPlaces = getAllPlaces($markers_table);
$rows = array();
while($r = $getPlaces->fetch(PDO::FETCH_ASSOC)){
    $rows[] = $r;
}
echo json_encode($rows);