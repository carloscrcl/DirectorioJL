<?php
require('funciones.php');
require('config.php');

// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";

$foto = $_GET['foto'];
$id = $_GET['id'];

$conexion = conexion($bd_config);

if (!$conexion) {
  echo "<h1 style='color: red;'>Error al conectar</h1>";
}
// echo "<h1 style='color: green;'>Conectado</h1>";

$datos = obtenerTarjeta($conexion, $id);


require("../views/editarImagen.view.php")


  ?>