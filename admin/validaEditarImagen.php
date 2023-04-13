<?php
include("../admin/funciones.php");
include("../admin/config.php");

if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $rama = $_POST['rama'];
    $id = $_POST['id'];
    $ruta = $_POST['ubicacion'];

}

$foto = $_FILES['foto'];
$ubicacionTemporal = $foto['tmp_name'];

$nombreFoto = $foto['name'];
$nombreFotoExplode = explode(".", $nombreFoto);
var_dump($nombreFotoExplode);
$rutaAnt = explode(".", $ruta);


$longitud = count($nombreFotoExplode);

if ($longitud > 2)

    $ext = $nombreFotoExplode[$longitud - 1];
if ($longitud == 2)
    $ext = $nombreFotoExplode[$longitud - 1];

$nuevoNombre = $rutaAnt[0] . "." . $ext;



// echo "<br>estoy aqui<br>";
// echo "<pre>";
// var_dump($ruta);
// echo "</pre>";
// var_dump($nuevoNombre);

borrarArchivo('../img/' . $ruta);

move_uploaded_file($ubicacionTemporal, '../img/' . $nuevoNombre);

$conexion = conexion($bd_config);
if (!$conexion) {
    echo "<h1 style='color: red;'>Error al conectar</h1>";
}
// echo "Estamos procesando la consulta ...<br><br>";

$consulta = "UPDATE vocales SET nombres='$nombre',
                                 `ap. paterno`='$paterno',
                                 `ap. materno`='$materno',
                                 email='$email',
                                 foto='$nuevoNombre',
                                 tipo_id=$tipo, 
                                 rama_id=$rama,
                                 WHERE id=$id;";

echo "<strong>$consulta</strong><br>";
$query = $conexion->prepare($consulta);

if ($query) {
    echo "la consulta ha sido procesada ...";
} else {
    echo "ERROR...";
}







// echo "Datos por POST: <br>";
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

// echo "Datos por FILES: <br>";
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";

?>