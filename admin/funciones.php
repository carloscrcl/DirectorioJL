<?php

include('config.php');

$data = $bd_config;
function conexion($bd_config)
{
  try {
    $dsn = "mysql:host=" . $bd_config['raiz'] . ":"
      . $bd_config['puerto'] . ";dbname=" . $bd_config['basedatos']
      . ";charset=utf8";

    $conexion = new PDO($dsn, $bd_config['usuario'], $bd_config['passwd']);
    return $conexion;
    // echo "hay conexion<br><br>";
  } catch (PDOException $e) {
    return false;
  }
}


function obtenerVocales($con)
{
  $consulta = "SELECT *
              FROM vocales";
  $query = $con->prepare($consulta);
  $query->execute();
  ;
  if ($query->rowCount() > 0) {
    $data = [];
    while ($registro = $query->fetch(PDO::FETCH_ASSOC)) {
      $vocal = [
        "id" => $registro['id'],
        "nombre" => $registro['nombres'],
        "paterno" => $registro['ap. paterno'],
        "materno" => $registro['ap. materno'],
        "email" => $registro['email'] . "@ine.mx",
        "foto" => $registro['foto'],
        "rama_id" => $registro['rama_id'],
        "tipo_id" => $registro['tipo_id'],
        "cargo_id" => $registro['cargo_id'],
        "distrito_id" => $registro['distrito_id'],
        "vocalia_id" => $registro['vocalia_id'],
        "ip" => $registro['ipphone_id']
      ];
      array_push($data, $vocal);
    }
  }
  return ($data) ? $data : "no tengo datos";

}



?>