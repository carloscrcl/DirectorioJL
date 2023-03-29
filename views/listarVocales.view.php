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
    <header class="contenedor c-header">
        <div class="logo">
            <img src="../img/Logo_INE.svg" alt="logo_ine">
        </div>
        <div class="titulo">
            <h1>INSTITUTO NACIONAL ELECTORAL</h1>
            <H2>JUNTA LOCAL EJECUTIVA</H2>
            <H2>Delegación Veracruz</H2>
            <h3>Integrantes del Servicio Profesional Electoral Nacional en el estado de Veracruz</h3>
        </div>

    </header>

    <div class="contenedor">
        <main>
            <div class="cuerpo">
                <div class="encabezado">

                    <article id="" class="card thCard">
                        <p>Vocal Ejecutivo</p>
                    </article>
                    <article id="" class="card thCard">
                        <p>Vocal Secretario</p>
                    </article>
                    <article id="" class="card thCard">
                        <p>Vocal de Capacitación</p>
                    </article>
                    <article id="" class="card thCard">
                        <p>Vocal de Organización</p>
                    </article>
                    <article id="" class="card thCard">
                        <p>Vocal del Registro</p>
                    </article>
                    <article id="" class="card thCard">
                        <p>JOSA</p>
                    </article>
                </div>



                <?php foreach ($datos as $vocal) {
                        if ((int) ($vocal['distrito_id']) > 0 && (int) ($vocal['distrito_id']) < 21) {
                ?>
                <article id="<?php echo $vocal["id"];?>" class="card">

                    <img class="cover" src="<?php echo '../img/' . $vocal['foto']; ?>" alt="<? echo $data['cargo']; ?>"
                        title="Patético jinete del rock and roll">

                    <div class="details">

                        <div class="description">
                            <p>
                                <?php echo $vocal['nombre']; ?>
                            </p>
                            <p>
                                <?php echo $vocal['paterno']; ?>
                            </p>
                            <p>
                                <?php echo $vocal['materno']; ?>
                            </p>
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
        </main>
    </div>
</body>

</html>