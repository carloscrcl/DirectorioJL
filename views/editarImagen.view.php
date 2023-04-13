<?php
include("fijos/head.php");
// echo "<pre>";
// var_dump($datos[0]);
// echo "</pre>";

?>
<div class="contenedor">

    <div class="contenedor-tarjeta">

        <div class="cabecera-tarjeta">
            <h2>
                <?php echo $datos[0]['distrito']; ?>
            </h2>
            <h3>
                <?php echo $datos[0]['cargo']; ?>
            </h3>
        </div>

        <!-- <div class="cuerpo-tarjeta"> -->

        <form action="" class="" id="form" method="post" enctype="multipart/form-data">
            <div class="cuerpo-tarjeta form">

                <div class="contenedor-imagen">
                    <img src="../img/<?php echo $foto; ?>" alt="" id="imgPrev">
                </div><!-- Contenedor de la imagen -->

                <div class="datos-foto">

                    <input type="text" name="nombre" value="<?php echo $datos[0]['nombre']; ?>" placeholder="Nombre(s)">

                    <input type="text" name="paterno" value="<?php echo $datos[0]['paterno']; ?>"
                        placeholder="Ap. Paterno">

                    <input type="text" name="materno" value="<?php echo $datos[0]['materno']; ?>"
                        placeholder="Ap. Materno">

                    <input type="text" name="email" value="<?php echo $datos[0]['email']; ?>" placeholder="email">
                    <p>
                        <?php echo $datos[0]['distrito']; ?>
                    </p>
                    <p class="embellecer">
                        <?php echo $datos[0]['ip']; ?>
                    </p>
                    <div class="form-radios">
                        <h3>Tipo: </h3>
                        <div class="form-radios_tipos">

                            <label for="titular">
                                <input type="radio" name="tipo" id="titular" value="1" checked> Titular</label>
                            <label for="encargado">
                                <input type="radio" name="tipo" id="encargado" value="2"> Encargado</label><br>
                        </div>
                        <div class="form-radio_rama">

                            <h3>Rama: </h3>
                            <label for="">
                                <input type="radio" name="rama" id="spen" value="1" checked> SPEN</label>
                            <label for="encargado">
                                <input type="radio" name="rama" id="pp" value="2"> Administrativo</label>
                            <label for="encargado">
                                <input type="radio" name="rama" id="hp" value="3"> Hp</label><br>
                        </div>
                    </div>
                </div><!-- Datos de la foto -->

            </div>

            <div class="form-seleccion-img">
                <input type="file" accept="image/*" name="archivo" id="imgLoaded" value="Selecciona foto">
                <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                <input type="hidden" name="ubicacion" id="ubicacion" value="<?php echo $datos[0]['foto'];?>">

            </div>

            <div class="pie-tarjeta">
                <button id="enviar" class="enviar" type="submit" id="enviar">Enviar</button>
                <button id="cancelar" class="cancelar" type="button">Cancelar</button>
            </div>

        </form>

    </div>
    <div id="respuesta">
        <h3>Aqui estará la respuesta del php</h3>

    </div>
</div>
<?php
include("fijos/footer.php");
?>
<script src="../js/funciones.js">

</script>
</body>

</html>