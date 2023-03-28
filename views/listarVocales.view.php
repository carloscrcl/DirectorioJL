<!DOCTYPE html>
<?php
// echo "<pre>";
// var_dump($datos);
// echo "</pre>";
// ?>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="" href="../css/estilos_tarjetas.css">

  <title>Directorio Junta Local</title>
</head>

<body>
  <div class="contenedor">
    <?php foreach ($datos as $vocal) {
      if ((int) ($vocal['distrito_id']) > 0 && (int) ($vocal['distrito_id']) < 21) {
        ?>
        <article id="" class="card">

          <img class="cover" src="<?php echo '../img/' . $vocal['foto']; ?>" alt="<? echo $data['cargo']; ?>"
            title="Patético jinete del rock and roll">
          <div class="details">
            <!-- <div class="titulo">
              <h2>
                <a class="title" title="" href="">
                  <span class="tutulo-resaltar">Vocal : </span>
                </a>
              </h2>
            </div> -->
            <div class="description">
              <p><span>
                  <?php echo $vocal['nombre']; ?>
                </span></p>
              <p><span>
                  <?php echo $vocal['paterno']; ?>
                </span></p>
              <p><span>
                  <?php echo $vocal['materno']; ?>
                </span></p>
              <p><span class="embellecer">
                  <?php echo $vocal['email']; ?>
                </span></p>

            </div>
            </ div>
        </article>
        <?php
      }
    }
    ?>

  </div>
</body>

</html>