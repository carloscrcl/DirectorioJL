<?php

require('config.php');
require('funciones.php');
$conexion = conexion($bd_config);
// echo "<pre></pre>";
// var_dump($conexion);
// echo "<pre></pre>";

if (!$conexion) {
  echo "<h1 style='color: red;'>Error al conectar</h1>";
}
// echo "<h1 style='color: green;'>Conectado</h1>";

$id = "1";
$datos = obtenerTarjeta($conexion, $id);
// echo "<pre></pre>";
var_dump($datos);
// echo "<pre></pre>";


// require("../views/listarVocales.view.php")


?>