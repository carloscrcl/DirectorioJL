<?php
include("../views/fijos/head.php");
?>

<div class="contenedor">
    <main>
        <!-- <div class="cuerpo"> -->
        <div class="encabezado">

            <article id="" class="card thCard">
                <h3>Vocal Ejecutivo</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal Secretario</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal de Capacitación</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal de Organización</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal del Registro</h3>
            </article>
            <article id="" class="card thCard">
                <h3>JOSA</h3>
            </article>
        </div>

        <div class="cuerpo">


            <?php foreach ($data as $vocal):
			
				if ((int) ($vocal['distrito_id']) > 0 && (int) ($vocal['distrito_id']) < 21): ?>

            <a class="body_card"
                href="<?php echo '../../admin/editarImagen.php?foto=' . $vocal['foto'] . '&id=' . $vocal['id']; ?>">

                <article id="<?php echo $vocal["id"]; ?>" class="body_card">

                    <div class="body_card-left">
                        <img class="body_card-img" src="<?php echo '../img/' . $vocal['foto']; ?>"
                            alt="<? echo $vocal['cargo_id']; ?>" title="" />
                    </div>

                    <div class="body_card_right">

                        <div class="body_card-right-details">
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
                                </span>
                            </p>

                        </div>
                        <!--FIN DETAILS-->
                    </div>
                    <!--FIN BODY CARD RIGHT-->

                </article>
            </a>
            <?php
				endif;
	endforeach;
	?>
        </div>
    </main>
</div>
<!--FIN CUERPO -->


<?php
	include("../views/fijos/footer.php");
	?>