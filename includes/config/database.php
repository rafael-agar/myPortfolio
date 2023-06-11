<?php 

function connectDB() : mysqli {
    $db = mysqli_connect('192.168.1.71', 'samsung', '', 'portfolio');

    if(!$db){
        echo "No se puedo conectar";
        exit;
    }

    return $db;
}

