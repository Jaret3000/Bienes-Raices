<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '020701EJ','bienesraices_crud', 3307);

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
}