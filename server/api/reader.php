<?php

if(!isset($_GET['from']) || !isset($_GET['to'])){
    http_response_code(416);
    return;
}

require_once '../class/database.php';

$db = new Database();

$donnees = $db->Lire($_GET['from'], $_GET['to']);

$json = array();
while($row = $donnees->fetch()){

    $obj = new \stdClass();
    $obj->date = $row["date"];
    $obj->temperature = $row["temp"];
    $obj->humidite = $row["humi"];
    $json[] = $obj;
}
echo json_encode($json);