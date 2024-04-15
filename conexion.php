<?php

$host = "localhost:3307";
$user = "root";
$pass = "";
$bd = "cerrajeria";

$conectar = mysqli_connect($host, $user, $pass, $bd);
if (!$conectar) {
    echo "BD no encontrada";
}















