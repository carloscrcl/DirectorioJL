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

$data = obtenerVocales($conexion);
echo "<pre></pre>";
var_dump($data);
echo "<pre></pre>";

$dir = opendir('../views/admin/');
while(false!=($archivo = readdir($dir))){
  // echo $archivo."<br>";
  if(is_file($archivo)){
    echo $archivo. "---> Archivo ";
  }
}

require("../views/admin/listarVocales.admin.view.php");

  ?>