<?php

require "conexion.php";

$tipo = $_POST["tipo"];
$precio = $_POST["precio"];
$tiempo = $_POST["tiempo"];
$area = $_POST["area"];

$rutaTemporal = $_FILES['foto']['tmp_name'];
$nombreImg = $_FILES['foto']['name'];
$tipoImg = $_FILES['foto']['type'];

$rutaEnServidor = 'fotos';

date_default_timezone_set('UTC');
$nombreImgFecha = date('Y-m-d').'-'.$nombreImg;

$rutaDestino = $rutaEnServidor.'/'.$nombreImgFecha;

if($tipoImg == "image/jpeg" or $tipoImg == "image/png" or $tipoImg == "image/webp" or $tipoImg == "image/jpg" or $tipoImg == "image/svg" or $tipoImg == "") {
  move_uploaded_file($rutaTemporal, $rutaDestino);
} else {
  echo "
  <script>
    alert('Extensión de archivo no permitada');
    window.history.go(-1);
  </script>
  ";
  exit;
}

//Validar peso de foto
$pesoImg = $_FILES['img']['size'];
if($pesoImg > 999000) {
  echo "
  <script>
    alert('Foto demasiado pesada');
    window.history.go(-1);
  </script>
  ";
  exit;
}

$insertar = "INSERT INTO servicio (tipo, precio, tiempo, area, imagen) VALUES ('$tipo', '$precio', '$tiempo', '$area', '$rutaDestino')";

$query = mysqli_query($conectar, $insertar);

if ($query){
  echo "
  <script>
    alert( 'Datos guardados exitosamente' );
    location.href= 'servicios.php'
  </script>
  ";
} else{
  echo "Error al intentar guardar el servicio";
}

