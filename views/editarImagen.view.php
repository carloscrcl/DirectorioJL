<?php
include("fijos/head.php");
// echo "<pre>";
// var_dump($datos);
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

        <form action="#" class="cuerpo-tarjeta form" method="post" enctype="multipart/form-data">
            <div class="contenedor-imagen">
                <img src="../img/<?php echo $foto; ?>" alt="" id="imgPrev">
            </div>
            <div class="datos-foto">

                <input type="text" name="" value="<?php echo $datos[0]['nombre']; ?>" placeholder="Nombre(s)">

                <input type="text" name="" value="<?php echo $datos[0]['paterno']; ?>" placeholder="Ap. Paterno">

                <input type="text" name="" value="<?php echo $datos[0]['materno']; ?>" placeholder="Ap. Materno">

                <input type="text" name="" value="<?php echo $datos[0]['email']; ?>" placeholder="email">
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
                            <input type="radio" name="rama" id="spen" checked> SPEN</label>
                        <label for="encargado">
                            <input type="radio" name="rama" id="pp"> Administrativo</label>
                        <label for="encargado">
                            <input type="radio" name="rama" id="hp"> Hp</label><br>
                    </div>
                </div>
            </div>
        </form>
        <!-- </div> -->
        <div class="form-seleccion-img">
            <input type="file" accept="image/*" onchange="imgPreview(event, '#imgPrev')" name="" id="imgLoaded"
                value="Selecciona foto">
        </div>
        <div class="pie-tarjeta">

            <button class="enviar" type="submit" id="enviar">Enviar</button>
            <button class="cancelar " type="button">Cancelar</button>

        </div>
    </div>
</div>
<?php
include("fijos/footer.php");
?>
<script src="../js/funciones.js">

</script>
</body>

</html>