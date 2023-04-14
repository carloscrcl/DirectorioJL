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
var_dump($nuevoNombre);


echo "<br>estoy aqui<br>";
echo "<pre>";
var_dump($ruta);
echo "</pre>";
var_dump($nuevoNombre);

borrarArchivo('../img/' . $ruta);

move_uploaded_file($ubicacionTemporal, '../img/' . $nuevoNombre);

$conexion = conexion($bd_config);
if (!$conexion) {
    echo "<h1 style='color: red;'>Error al conectar</h1>";
}
// echo "Estamos procesando la consulta ...<br><br>";

$consulta = "UPDATE vocales SET nombres=?,
                                 `ap. paterno`=?,
                                 `ap. materno`=?,
                                 email=?,
                                 foto=?,
                                 tipo_id=?, 
                                 rama_id=?
                                 WHERE id=?";
$sentencia = $conexion->prepare($consulta);
$resultado = $sentencia->execute([$nombre, $paterno, $materno, $email, $nuevoNombre, $tipo, $rama, $id]); # Pasar en el mismo orden de los ?

// echo "<strong>$consulta</strong><br>";
// $query = $conexion->prepare($consulta);

if($resultado === TRUE) {
    echo "Cambios guardados";
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";




header("Location: listarVocales.admin.php");




// echo "Datos por POST: <br>";
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

// echo "Datos por FILES: <br>";
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";

?>