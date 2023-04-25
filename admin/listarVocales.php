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

$vocales = obtenerVocales($conexion);

$datosJl = obtenerJunta($conexion, 21);

$direcciones = obtenerDirecciones($conexion);

// // echo "<pre>";
// var_dump($datosJl);
// echo "</pre>";


require("../views/listarVocales.view.php")

  ?>