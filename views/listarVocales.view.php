<?php
include '../views/fijos/head.php';
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
            <?php


            ?>
            <?php foreach ($datos as $vocal) {
                if ((int) ($vocal['distrito_id']) > 0 && (int) ($vocal['distrito_id']) < 21) {
                    ?>
                    <article id="<?php echo $vocal["id"]; ?>" class="card">

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
                        </div>
                    </article>
                    <?php
                }
            }
            ?>
            <!-- </div> -->
        </div>
    </main>
</div>
<?php
include("../views/fijos/footer.php");
?>