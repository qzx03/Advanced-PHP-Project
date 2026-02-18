<?php

function ADDinfo($ALLinfo) {

    $file = "data/consultations.json";

    $json = file_get_contents($file);
    $data = json_decode($json, true);

    if (!$data) {
        $data = [];
    }

    $data[] = $ALLinfo;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

function displayINFO(){
    
}


?>