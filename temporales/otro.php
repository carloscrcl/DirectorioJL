<?php


$rutaOrigen = "img/jd1";
$rutaDestino = "img/jd";


copia_completa($rutaOrigen, $rutaDestino);




function copia_completa($origen, $destino)
{
  for ($i = 2; $i < 21; $i++) {
    
    if (is_dir($origen)) {
    $destinoOriginal = $destino.$i;
    
    @mkdir($destinoOriginal);
    echo "Se ha creado la carpeta: <i>" . $destino . "</i><br>";

    $d = dir($origen);

    //mientras la lectura del directorio sea direfente de falso (que no haya llegado a su fin)
    
    $cont = 1;
    while (($archivo = $d->read()) !== FALSE && $cont <= 6) {
      // si encontramos los puntos de raiz y retorno al directorio anterior
      if ($archivo == '.' || $archivo == '..') {
        continue;
      }
      echo "Archivo; ".$archivo ." --> " . $cont."<br>";      
    
      
        $datosArchivo = explode(".",$archivo);
        echo "<pre>";
        var_dump($datosArchivo);
        echo "</pre>";
        $sinNumeros= substr($datosArchivo[0],0,-1);
        $destinoOriginal .=  "/".$sinNumeros.$i.".".$datosArchivo[1];
        copy($origen. "/". $archivo, $destinoOriginal);
    
      $cont++;
      $destinoOriginal = "img/jd".$i ; 
      echo $destinoOriginal."<br>"; 
    }

  }

  }
}

?>