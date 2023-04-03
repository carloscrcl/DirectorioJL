<?php
include("../views/fijos/head.php");
?>

<div class="contenedor">
    <main>
        <!-- <div class="cuerpo"> -->
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

        <div class="cuerpo">
            <?php foreach ($data as $vocal) {
                if ((int) ($vocal['distrito_id']) > 0 && (int) ($vocal['distrito_id']) < 21) {
                    ?>

                    <a href="<?php echo '../../admin/editarImagen.php?foto=' . $vocal['foto'] . '&id=' . $vocal['id']; ?>">

                        <article id="<?php echo $vocal["id"]; ?>" class="card">

                            <img class="cover" src="<?php echo '../img/' . $vocal['foto']; ?>" alt="<? echo $data['cargo']; ?>"
                                title="<?php echo $vocal['nombre'] . " " . $vocal['paterno']; ?>">

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
                            </div>
                        </article>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
        <!-- </div> -->
    </main>
    <?php
    include("../views/fijos/footer.php");
    ?>