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
        "email" => $registro['email'],
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

function obtenerTarjeta($con, $id)
{
  $consulta = "SELECT vocales.nombres, vocales.`ap. paterno`, vocales.`ap. materno`,vocales.foto, vocales.email, vocales.rama_id, vocales.tipo_id,
  ramas.descripcion as `rama`, tipos.descripcion as `tipo`, 
  cargos.nombre as `cargo`, 
  distritos.texto_id as `Num`, distritos.nombre as `Distrito`, 
  vocalias.ext as `ext`, vocalias.descripcion as `Vocalia` 
  
  FROM vocales, ramas, tipos, cargos, vocalias_distritos, distritos, vocalias   
  WHERE vocales.id = $id AND
	    vocales.rama_id = ramas.rama_id
       AND tipos.id = vocales.tipo_id
       AND cargos.cargo_id = vocales.cargo_id
       AND vocales.distrito_id = vocalias_distritos.distrito_id
       AND vocalias_distritos.distrito_id = distritos.distrito_id
       AND vocales.vocalia_id = vocalias_distritos.vocalia_id
       AND vocalias_distritos.vocalia_id = vocalias.vocalia_id";

  $query = $con->query($consulta);


  $data = [];
  if (!$query) {
    echo "Funciones: No se esta ejecutando la consulta<br> ";
  } else {

    $query = $con->prepare($consulta);
    $query->execute();


    // if($query->rowCount()>0){
    $registro = $query->fetch(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // var_dump($registro);
    // echo "</pre>";
    $vocal = [
      "nombre" => $registro['nombres'],
      "paterno" => $registro['ap. paterno'],
      "materno" => $registro['ap. materno'],
      "foto" => $registro['foto'],
      "email" => $registro['email'],
      "rama" => $registro['rama'],
      "rama_id" => $registro['rama_id'],
      "tipo" => $registro['tipo'],
      "tipo_id" => $registro['tipo_id'],
      "cargo" => $registro['cargo'],
      "numeroDist" => $registro['Num'],
      "distrito" => $registro['Distrito'],
      "extension" => $registro['ext'],
      "vocalia" => $registro['Vocalia'],
      "ip" => "30" . $registro['Num'] . $registro['ext']
    ];


    array_push($data, $vocal);

  }
  return ($data) ? $data : "no tengo datos";
  // }
}
function obtenerJunta($con, $id)
{
  $consulta = "SELECT vocales.id, vocales.nombres, vocales.`ap. paterno`, vocales.`ap. materno`,vocales.foto, vocales.email,
  ramas.descripcion as `rama`, tipos.descripcion as `tipo`, 
  cargos.nombre as `cargo`, 
  distritos.texto_id as `Num`, distritos.nombre as `Distrito`, distritos.distrito_id as dist,
  vocalias.ext as `ext`, vocalias.descripcion as `Vocalia` 
  
  FROM vocales, ramas, tipos, cargos, vocalias_distritos, distritos, vocalias   
  WHERE distritos.distrito_id = $id AND
	    vocales.rama_id = ramas.rama_id
       AND tipos.id = vocales.tipo_id
       AND cargos.cargo_id = vocales.cargo_id
       AND vocales.distrito_id = vocalias_distritos.distrito_id
       AND vocalias_distritos.distrito_id = distritos.distrito_id
       AND vocales.vocalia_id = vocalias_distritos.vocalia_id
       AND vocalias_distritos.vocalia_id = vocalias.vocalia_id
  ORDER BY vocales.id asc ";

  $query = $con->query($consulta);


  $data = [];
  if (!$query) {
    echo "Funciones: No se esta ejecutando la consulta<br> ";
  } else {

    $query = $con->prepare($consulta);
    $query->execute();


    // if($query->rowCount()>0){
    while ($registro = $query->fetch(PDO::FETCH_ASSOC)) {

      // echo "<pre>";
      // var_dump($registro);
      // echo "</pre>";
      $vocal = [
        "id" => $registro['id'],
        "distrito_id" => $registro['dist'],
        "nombre" => $registro['nombres'],
        "paterno" => $registro['ap. paterno'],
        "materno" => $registro['ap. materno'],
        "foto" => $registro['foto'],
        "email" => $registro['email'],
        "rama" => $registro['rama'],
        "tipo" => $registro['tipo'],
        "cargo" => $registro['cargo'],
        "numeroDist" => $registro['Num'],
        "distrito" => $registro['Distrito'],
        "extension" => $registro['ext'],
        "vocalia" => $registro['Vocalia'],
        "ip" => "30" . $registro['Num'] . $registro['ext']

      ];
      array_push($data, $vocal);
    }


  }
  return ($data) ? $data : "no tengo datos";
  // }
}


function borrarArchivo($ruta)
{
  (touch($ruta)) ? unlink($ruta) : touch($ruta);
}




?>