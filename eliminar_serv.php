<?php
include("seguridad.php");
require "conexion.php";

$id = $_GET["id"];
//echo $id;

$eliminar = "DELETE FROM servicio WHERE id_servicio = $id";

$query = mysqli_query($conectar, $eliminar);

if ($query){
  echo "
  <script>
  alert( 'Servicio eliminado de la BD' );
  location.href= 'servicios.php'
  </script>
  ";
}
else{
  echo "TRONÓ";
}