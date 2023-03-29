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
        "email" => $registro['email'] ,
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

function obtenerTarjeta($con, $id){
  $consulta = "SELECT v.nombres, v.`ap. paterno`, v.`ap. materno`,v.foto, 
  r.descripcion, t.descripcion, 
  c.nombre, 
  d.texto_id, d.nombre, 
  vc.ext, vc.descripcion
  FROM vocales v, ramas r, tipos t, cargos c, vocalias_distritos vd, distritos d, vocalias vc
  WHERE v.id = ". $id .
      "AND v.rama_id = r.rama_id
       AND t.id = v.tipo_id
       AND c.cargo_id = v.cargo_id
       AND v.distrito_id = vd.distrito_id
       AND vd.distrito_id = d.distrito_id
       AND v.vocalia_id = vd.vocalia_id
       AND vd.vocalia_id = vc.vocalia_id;";
  $query = $con->query($consulta);
  $data = [];
  if(!$query){
    echo "No se esta ejecutando la consulta<br> ";
  }else{

    $query = $con->prepare($consulta);
    $query->execute();
    
    // if($query->rowCount()>0){
    $registro = $query->fetch(PDO::FETCH_ASSOC);
      var_dump($registro);
      array_push($data, $registro);
      
    }
    return ($data) ? $data : "no tengo datos";
  // }
}





?>