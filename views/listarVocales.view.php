<?php
include '../views/fijos/head.php';
?>

<div class="contenedor">
  <main>
    <!--<div class="cuerpo-principal">

       <?php foreach ($datosJl as $miembro) {
         if ((int) ($miembro['distrito_id']) === 21) { ?>
          <div class="encabezado">
              <article id="" class="card thCard-jl">
                  <p>
                      <?php echo $miembro['cargo']; ?>
                  </p>
              </article>
          </div>
          <article id="<?php echo $miembro['id']; ?>" class="card">

              <img class="cover" src="<?php echo '../img/' . $miembro['foto']; ?>"
                  alt="<?php echo $miembro['cargo']; ?>" title="">

              <div class="details">

                  <div class="description">
                      <p>
                          <?php echo $miembro['nombre']; ?>
                      </p>
                      <p>
                          <?php echo $miembro['paterno']; ?>
                      </p>
                      <p>
                          <?php echo $miembro['materno']; ?>
                      </p>
                      <p><span class="embellecer">
                              <?php echo $miembro['email']; ?>
                          </span></p>

                  </div>
              </div>
          </article>
          <?php
         }
       }
       ?> 
    </div>-->
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
    <!--FIN ENCABEZADO-->

    <div class="cuerpo">

      <?php
      foreach ($datos as $vocal):
        if ((int) ($vocal['distrito_id']) > 0 && (int) ($vocal['distrito_id']) < 21): ?>

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
          <?php
        endif;
      endforeach;
      ?>

    </div>
    <!--FIN CUERPO -->
  </main><!-- FIN MAIN -->
</div>
<!--FIN COPNTENEDOR-->
<?php
include("../views/fijos/footer.php");
?>