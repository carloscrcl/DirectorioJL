<?php
include("../admin/funciones.php");
include("../admin/config.php");

if(!empty($_POST)){
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $ruta = $_POST['ubicacion'];
    
}

    $foto=$_FILES['foto'];
    $ubicacionTemporal = $foto['tmp_name'];

    $nombreFoto= $foto['name'];
    $nombreFotoExplode = explode( ".", $nombreFoto);
    $longitud = count($nombreFotoExplode);
    $ruta = explode(".", $ruta);

    if($longitud > 2) $ext = $nombreFotoExplode[$longitud-1];
    if ($longitud == 2) $ext = $nombre[$longitud-1];
    
    $nuevoNombre = $ruta[0].".".$ext;

    
    
    var_dump($ruta);
    var_dump($nuevoNombre);

$conexion = conexion($bd_config);
if (!$conexion) {
    echo "<h1 style='color: red;'>Error al conectar</h1>";
  }

$consulta = "UPDATE vocales SET (nombres='$nombre',
                                 `ap. paterno`='$paterno' ,
                                 `ap. materno`='$materno',
                                 email='$email',
                                 foto='$nuevoNombre' )
                                 
                                 WHERE id=$id";

$query = $conexion->prepare($consulta);



echo "<strong>$consulta</strong><br>";





echo "Datos por POST: <br>";
echo "<pre>";
var_dump($_POST);
echo "</pre>";

echo "Datos por FILES: <br>";
echo "<pre>";
var_dump($_FILES);
echo "</pre>";

?>